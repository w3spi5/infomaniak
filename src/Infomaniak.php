<?php

namespace Infomaniak;

use Infomaniak\FluxState;
use Infomaniak\LiveStats;
use Infomaniak\CurrentListeners;
use Carbon\Carbon;

class Infomaniak
{    
    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $passwd;

    /**
     * @var int
     */
    protected $rate;

    /**
     * @var string
     */
    protected $codec;

    /**
     * @var string
     */
    public $erreur;

    /**
     * @var Carbon
     */
    public $dateMaj;

    /**
     * @var Object
     */
    public $flux;

    /**
     * @var Object
     */
    public $live;

    /**
     * @var Object
     */
    public $current;

    CONST LOGIN_INVALIDE    = "Nom d'utilisateur invalide";
    CONST PASSWD_INVALIDE   = "Mot de passe invalide";
    CONST RATE_INVALIDE     = "Débit invalide";
    CONST CODEC_INVALIDE    = "Codec invalide";
    CONST URL_INVALIDE      = "Impossible d'accéder à Infomaniak";

    /**
     * Instance de l'objet Infomaniak
     * @param string $login
     * @param string $passwd
     * @param string $rate
     * @param string $codec
     * @return void
     */
    public function __construct($login = null, $passwd = null, $rate = null, $codec = null)
    {
        $this->setLogin($login);
        $this->setPasswd($passwd);
        $this->setRate($rate);
        $this->setCodec($codec);
        $this->setDateMaj($this->getDatetime());
        $this->fluxState();
        $this->liveStats();
        $this->currentListeners();
    }

    /**
     * Obtenir la date actuelle
     * @return Carbon Object
     */
    private function getDatetime()
    {
        $mytime = Carbon::now();
        return $mytime->toDateTimeString();
    }

    /**
     * Méthode permettant d'assigner le login
     * @param string $login
     */
    public function setLogin($login)
    {
        if (!is_string($login) || empty($login) || is_null($login)) {
        	$this->erreur = self::LOGIN_INVALIDE;
        } else {
            $this->login = $login;
        }
    }

    /**
     * Méthode permettant d'assigner le mot de passe
     * @param string $passwd
     */
    public function setPasswd($passwd)
    {
        if (!is_string($passwd) || empty($passwd) || is_null($passwd)) {
            $this->erreur = self::PASSWD_INVALIDE;
        } else {
            $this->passwd = $passwd;
        }
    }

    /**
     * Méthode permettant d'assigner le débit du flux
     * @param string $rate
     */
    public function setRate($rate)
    {
        if (!is_int($rate) || empty($rate) || is_null($rate)) {
            $this->erreur = self::RATE_INVALIDE;
        } else {
            $this->rate = $rate;
        }
    }

    /**
     * Méthode permettant d'assigner le codec utilisé. Eg. mp3 / aac
     * @param string $codec
     */
    public function setCodec($codec)
    {
        if (!is_string($codec) || empty($codec) || is_null($codec)) {
            $this->erreur = self::CODEC_INVALIDE;
        } else {
            $this->codec = $codec;
        }
    }

    /**
     * Définit la date de mise à jour courante
     * @param  string $dateMaj
     */
    public function setDateMaj($dateMaj)
    {
        $this->dateMaj = $dateMaj;
    }

    /**
     * Méthode permettant d'avoir le statut des flux en direct
     * @return void
     */
    private function fluxState()
    {
    	$principal = @file_get_contents('https://'.$this->login.':'.$this->passwd.'@statslive.infomaniak.com/radio/diag/status.php?mount=/'.$this->login.'-'.$this->rate.'.'.$this->codec.'');
    	$backup = @file_get_contents('https://'.$this->login.':'.$this->passwd.'@statslive.infomaniak.com/radio/diag/status.php?mount=/'.$this->login.'-'.$this->rate.'-bak.'.$this->codec.'');

        if ($principal === false || $backup === false) {
            $this->erreur = self::URL_INVALIDE;
        }

        try {
            $this->flux = new FluxState(
                [
                    'principal' => $principal,
                    'backup'    => $backup,
                    'dateMaj'   => $this->getDatetime()
                ]
            );
        } catch (Exception $e) {
            $this->erreur = $e->getMessage();
        }        
    }

    /**
     * Méthode permettant d'obtenir le nombre maximum d'auditeurs et celui actuel
     * @return void
     */
    private function liveStats()
    {
        $xml = 'https://'.$this->login.':'.$this->passwd.'@statslive.infomaniak.com/admin/stats.xml';
        try {
            $xml = simplexml_load_file($xml);
            $peak = $xml->source->listener_peak;
            $current = $xml->source->listeners;

            $this->live = new LiveStats(
                [
                    'peak'    => $peak,
                    'current' => $current
                ]
            );
        } catch (Exception $e) {
            $this->erreur = $e->getMessage();
        }
    }

    /**
     * Méthode permettant d'obtenir les informations précises sur les auditeurs actuels
     * @return void
     */
    private function currentListeners()
    {
        $xml = 'https://statslive.infomaniak.com/mediastats.php?radio='.$this->login.'-'.$this->rate.'.'.$this->codec.'&id='.$this->passwd;
        $xml = simplexml_load_file($xml);

        $statsArray = array();
        foreach ($xml->source->listener as $listener) {
            $statsArray[] = new CurrentListeners(
                [
                    'ip'          => $listener->IP,
                    'dureeEcoute' => $listener->Connected
                ]
            );
        }
        $this->current = $statsArray;
    }   
}
