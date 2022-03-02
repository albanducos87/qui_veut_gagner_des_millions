<?php

class QuestionManager {
    private $dbo;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllQuestionsAvecReponse() {
        $req = $this->db->prepare("SELECT * FROM question q JOIN reponses r on q.idQuestion = r.idQuestion");
        $req->execute();
        return $req->fetch();
    }

}

?>