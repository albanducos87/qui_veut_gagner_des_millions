<?php

class Utilisateur {
    private $idUtilisateur, $nom, $prenom, $mail, $mdp;

    public function __construct($valeurs = array()){
        if (!empty($valeurs))
            $this->affecte($valeurs);
    }

    public function affecte($donnees) {
        foreach ($donnees as $attribut => $valeur) {
            switch($attribut) {
                case 'idUtilisateur' : $this->setIdUtilisateur(idUtilisateur); break;
                case 'nom' : $this->setNom(nom); break;
                case 'prenom' : $this->setPrenom(prenom); break;
                case 'mail' : $this->setMail(mail); break;
                case 'mdp' : $this->setMdp(mdp); break;
            }
        }
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
    public function setIdUtilisateur($valeur) {
        $this->idUtilisateur = $valeur;
    }

    public function getNom() {
        return $this->nom;
    }
    public function setNom($valeur) {
        $this->nom = $valeur;
    }

    public function getPrenom() {
        return $this->prenom;
    }
    public function setPrenom($valeur) {
        $this->prenom = $valeur;
    }

    public function getMail() {
        return $this->mail;
    }
    public function setMail($valeur) {
        $this->mail = $valeur;
    }

    public function getMdp() {
        return $this->mdp;
    }
    public function setMdp($valeur) {
        $this->mdp = $valeur;
    }
}

?>
