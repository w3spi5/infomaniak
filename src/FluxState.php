<?php

namespace rypsx\Infomaniak;

class FluxState {

    /**
     * @var string
     */
    public $principal;

    /**
     * @var string
     */
    public $backup;

    CONST PRINCIPAL_INVALIDE = "Impossible d'accéder au flux principal";
    CONST BACKUP_INVALIDE    = "Impossible d'accéder au flux de backup";

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
     * Permet l'assignation du flux principal
     * @param string $principal
     */
    public function setPrincipal($principal)
    {
        if (is_string($principal) || !empty($principal)) {
            $this->principal = $principal;
        }
    }

    /**
     * Permet l'assignation du flux de backup
     * @param string $backup
     */
    public function setBackup($backup)
    {
        if (is_string($backup) || !empty($backup)) {
            $this->backup = $backup;
        }
    }
}
