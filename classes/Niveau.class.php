<?php

class Niveau {
    private $idNiveau;
    private $prix;

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
                case 'idNiveau' : $this->setIdNiveau($valeur); break;
                case 'prix' : $this->setPrix($valeur); break;
            }
        }
    }

    public function getIdNiveau() {
        return $this->idNiveau;
    }
    public function setIdNiveau($valeur) {
        $this->idNiveau = $valeur;
    }

    public function getPrix() {
        return $this->prix;
    }
    public function setPrix($valeur) {
        $this->prix = $valeur;
    }
}

?>