<?php

class UtilisateurManager {
    private $dbo;

    public function __construct($db){
        $this->db = $db;
    }

    public function inscription($nom, $prenom, $mail, $pwd){
        $req = $this->db->prepare("INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES (:nom, :prenom, :mail, :mdp)");
        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':mail', $mail);
        $req->bindValue(':mdp', $pwd);

        return $req->execute();
    }

    public function isMailOk($mail) {
        $tabUtilisateurs = array();
        $req = $this->db->prepare("SELECT * FROM utilisateur WHERE mail = :mail");
        $req->bindValue(':mail', $mail);
        $req->execute();

        while ($utilisateur = $req->fetch(PDO::FETCH_OBJ)) {
            $tabUtilisateurs[] = new Utilisateur($utilisateur);
        }

        return count($tabUtilisateurs);
    }

    // faire la fonction de connexion 
    public function isLoginOk($mail, $mdp){
        $tabUtilisateurs = array();
        $req = $this->db->prepare("SELECT idUtilisateur FROM utilisateur WHERE mail = :mail AND mdp = :mdp");
        $req->bindValue(':mail', $mail);
        $req->bindValue(':mdp', $mdp);
        $req->execute();

        while ($utilisateur = $req->fetch(PDO::FETCH_OBJ)) {
            $id = $utilisateur->idUtilisateur;
        }

        if(isset($id)){
            return $id;
        }
    }

    public function getInformationsUser($idUtilisateur) {
        $req = $this->db->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = :idUtilisateur");
        $req->bindValue(':idUtilisateur', $idUtilisateur);
        return $req->execute();
    }
}

?>