<?php

class QuestionReponse {
    public $id;
    public $question;
    public $fake1;
    public $fake2;
    public $fake3;
    public $reponse;
    public $niveau;

    public function __construct($valeurs = array()){
        if (!empty($valeurs))
            $this->affecte($valeurs);
    }

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur) {
            switch($attribut) {
                case 'idQuestion' : $this->id = $valeur; break;
                case 'question' : $this->question = $valeur; break;
                case 'fake1' : $this->fake1 = $valeur; break;
                case 'fake2' : $this->fake2 = $valeur; break;
                case 'fake3' : $this->fake3 = $valeur; break;
                case 'reponse' : $this->reponse = $valeur; break;
                case 'idNiveau' : $this->niveau = $valeur; break;
            }
        }
    }
}

?>