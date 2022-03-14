<?php

class QuestionManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllQuestionsAvecReponse() {
        $req = $this->db->prepare("SELECT * FROM question q JOIN reponses r on q.idQuestion = r.idQuestion");
        $req->execute();
        return $req->fetch();
    }

    public function getQuestionActuelle($idPalier) {
        $req = $this->db->prepare("SELECT * FROM question WHERE idNiveau = :idPalier");
        $req->bindValue(':idPalier', $idPalier);
        $req->execute();

        while ($question = $req->fetch(PDO::FETCH_OBJ)) {
            $questionEnCours['idQuestion'] = $question->idQuestion;
            $questionEnCours['question'] = $question->question;
        }

        if (isset($questionEnCours))
            return $questionEnCours;
    }

}

?>