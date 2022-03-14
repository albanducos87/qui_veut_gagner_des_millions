<?php

class NiveauManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllNiveaux() {
        $req = $this->db->prepare("SELECT * FROM niveau ORDER BY idNiveau DESC");
        $req->execute();

        return $req;
    }

}

?>