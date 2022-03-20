<?php

class NiveauManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    function getAllNiveaux()
    {
        $stmt = $this->db->prepare("SELECT * FROM niveau ORDER BY idNiveau DESC");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

}

?>