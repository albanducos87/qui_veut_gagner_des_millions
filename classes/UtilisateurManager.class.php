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

}

?>