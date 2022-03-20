<?php

class PartieManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function initPartie($idUtilisateur) {
        $req = $this->db->prepare("INSERT INTO partie(idUtilisateur, palier, datePartie, indice5050, indiceAppel, indiceVote) VALUES (:idUtilisateur, 1, CURDATE(),0,0,0)");
        $req->bindValue(':idUtilisateur', $idUtilisateur);
        return $req->execute();
    }

    public function getPartieEnCours($idUtilisateur) {
        $req = $this->db->prepare("SELECT idPartie, prix, palier FROM partie p
                                   INNER JOIN niveau n ON n.idNiveau = p.palier
                                   WHERE idUtilisateur = :idUtilisateur ORDER BY idPartie DESC LIMIT 1");
        $req->bindValue(':idUtilisateur', $idUtilisateur);
        $req->execute();

        while ($partie = $req->fetch(PDO::FETCH_OBJ)) {
            $partieActu['idPartie'] = $partie->idPartie;
            $partieActu['prix'] = $partie->prix;
            $partieActu['palier'] = $partie->palier;
        }

        if (isset($partieActu))
            return $partieActu;
    }

    public function majPartieUtilisateur($palier, $idPartie) {
        $req = $this->db->prepare("UPDATE partie SET palier = :palier WHERE idPartie = :idPartie");
        $req->bindValue(':palier', $palier);
        $req->bindValue(':idPartie', $idPartie);
        return $req->execute();
    }

    public function getClassement() {
        $req = $this->db->prepare("SELECT p.idUtilisateur, prix, nom, prenom FROM partie p 
                                    INNER JOIN utilisateur u ON u.idUtilisateur = p.idUtilisateur
                                    INNER JOIN niveau n ON n.idNiveau = p.palier
                                    ORDER BY palier DESC LIMIT 10");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>