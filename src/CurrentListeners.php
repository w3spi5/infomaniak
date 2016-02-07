<?php

namespace Infomaniak;

class CurrentListeners {

    /**
     * @var string
     */
    public  $ip;

    /**
     * @var int
     */
    public $dureeEcoute;

    CONST IP_INVALIDE    = "L'adresse IP renseignée est invalide";
    CONST DUREE_INVALIDE = "La durée d'écoute est invalide";

    /**
     * Construction de l'objet Status
     * @param array $valeurs
     */
    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) {
            $this->rechercheMethode($valeurs);
        }
    }

    /**
     * Méthode permettant d'assigner les valeurs spécifiées en paramètre aux attributs correspondants
     * @param  array $donnees
     * @return void
     */
    public function rechercheMethode($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            $methode = 'set'.ucfirst($attribut);
            if (is_callable([$this, $methode])) {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * Permet l'assignation de l'ip
     * @param string $ip
     */
    public function setIp($ip)
    {
        if (empty($ip)) {
        	throw new Exception(self::IP_INVALIDE);
        } else {
            $this->ip = $ip;
        }
    }

    /**
     * Permet l'assignation de la durée d'écoute
     * @param string $dureeEcoute
     */
    public function setDureeEcoute($dureeEcoute)
    {
        if (!is_int((int) $dureeEcoute) || empty($dureeEcoute)) {
            throw new Exception(self::DUREE_INVALIDE);
        } else {
            if (($dureeEcoute / 60) < 1) {
                $dureeFormatee = round($dureeEcoute, 0).' sec';
            } else {
                if (($dureeEcoute / 60) < 60) {
                    $dureeFormatee = round($dureeEcoute / 60, 0).' min';
                } else {
                    $dureeFormatee = round($dureeEcoute / 3600, 0);
                    if (round($dureeEcoute / 3600, 0) == 1) {
                        $dureeFormatee .= ' heure';
                    } else {
                        $dureeFormatee .= ' heures';
                    }
                }
            }
            $this->dureeEcoute = $dureeFormatee;
        }
    }
}
