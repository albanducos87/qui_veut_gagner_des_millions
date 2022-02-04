<?php

class Partie {
    private $idPartie;
    private $idUtilisateur;
    private $score;
    private $indice5050;
    private $indiceQuestion;

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
                case 'idPartie' : $this->setIdPartie($valeur); break;
                case 'idUtilisateur' : $this->setIdUtilisateur($valeur); break;
                case 'score' : $this->setScore($valeur); break;
                case 'indice5050' : $this->setIndice5050($valeur); break;
                case 'indiceQuestion' : $this->setIndiceQuestion($valeur); break;
            }
        }
    }

    public function getIdPartie() {
        return $this->idPartie;
    }
    public function setIdPartie($valeur) {
        $this->idPartie = $valeur;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
    public function setIdUtilisateur($valeur) {
        $this->idUtilisateur = $valeur;
    }

    public function getScore() {
        return $this->score;
    }
    public function setScore($valeur) {
        $this->score = $valeur;
    }

    public function getIndice5050() {
        return $this->indice5050;
    }
    public function setIndice5050($valeur) {
        $this->indice5050 = $valeur;
    }

    public function getIndiceQuestion() {
        return $this->indiceQuestion;
    }
    public function setIndiceQuestion($valeur) {
        $this->indiceQuestion = $valeur;
    }

}

?>