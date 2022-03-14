<?php

class Reponses {
    private $idReponse, $idQuestion, $fake1, $fake2, $fake3, $reponse;

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur) {
            switch($attribut) {
                case 'idReponse' : $this->idReponse; break;
                case 'idQuestion' : $this->idQuestion; break;
                case 'fake1' : $this->fake1; break;
                case 'fake2' : $this->fake2; break;
                case 'fake3' : $this->fake3; break;
                case 'reponse' : $this->reponse; break;
            }
        }
    }

    public function getIdReponse() {
        return $this->idReponse;
    }
    public function setIdReponse($valeur) {
        $this->idReponse = $valeur;
    }

    public function getIdQuestion() {
        return $this->idQuestion;
    }
    public function setIdQuestion($valeur) {
        $this->idQuestion = $valeur;
    }

    public function getFake1() {
        return $this->fake1;
    }
    public function setFake1($valeur) {
        $this->fake1 = $valeur;
    }

    public function getFake2() {
        return $this->fake2;
    }
    public function setFake2($valeur) {
        $this->fake2 = $valeur;
    }

    public function getFake3() {
        return $this->fake3;
    }
    public function setFake3($valeur) {
        $this->fake3 = $valeur;
    }

    public function getReponse() {
        return $this->reponse;
    }
    public function setReponse($valeur) {
        $this->reponse = $valeur;
    }
}

?>
