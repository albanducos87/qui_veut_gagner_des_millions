<?php

class Question {
    private $idQuestion, $question, $reponse, $idNiveau, $indice;

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur) {
            switch($attribut) {
                case 'idQuestion' : $this->idQuestion; break;
                case 'question' : $this->question; break;
                case 'reponse' : $this->reponse; break;
                case 'idNiveau' : $this->idNiveau; break;
                case 'indice' : $this->indice; break;
            }
        }
    }

    public function getIdQuestion() {
        return $this->idQuestion;
    }
    public function setIdQuestion($valeur) {
        $this->idQuestion = $valeur;
    }

    public function getQuestion() {
        return $this->question;
    }
    public function setQuestion($valeur) {
        $this->question = $valeur;
    }

    public function getReponse() {
        return $this->reponse;
    }
    public function setReponse($valeur) {
        $this->reponse = $valeur;
    }

    public function getIdNiveau() {
        return $this->idNiveau;
    }
    public function setIdNiveau($valeur) {
        $this->idNiveau = $valeur;
    }

    public function getIndice() {
        return $this->indice;
    }
    public function setIndice($valeur) {
        $this->indice = $valeur;
    }
}

?>
