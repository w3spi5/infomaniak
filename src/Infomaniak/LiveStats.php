<?php

namespace Rypsx\Infomaniak;

class LiveStats {

    /**
     * @var int
     */
    public $peak;

    /**
     * @var int
     */
    public $current;

    CONST PEAK_INVALIDE     = "Impossible d'obtenir le nombre maximum d'auditeurs";
    CONST CURRENT_INVALIDE  = "Impossible d'obtenir le nombre d'auditeurs actuels";

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
     * Permet l'assignation du nombre maximum d'auditeurs
     * @param string $peak
     */
    public function setPeak($peak)
    {

        if (!is_int((int) $peak) || empty($peak)) {
        	throw new \Exception(self::PEAK_INVALIDE);
        } else {
            $this->peak = (int) $peak;
        }
    }

    /**
     * Permet l'assignation du nombre d'auditeurs actuels
     * @param string $peak
     */
    public function setCurrent($current)
    {
        if (!is_int((int) $current) || empty($current)) {
        	throw new \Exception(self::CURRENT_INVALIDE);
        } else {
            $this->current = (int) $current;
        }
    }
}
