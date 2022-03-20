<?php
use QuestionReponse;
class QuestionManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllQuestionsAvecReponse() {
        $liste = array();
        $req = $this->db->prepare("SELECT * FROM question q JOIN reponses r on q.idQuestion = r.idQuestion");
        $req->execute();
        while ($res = $req->fetch(PDO::FETCH_OBJ)) {
            $liste[] = new QuestionReponse($res);
        }
        $req->closeCursor();
        return $liste;
    }

    public function countQuestions() {
        $req = $this->db->prepare("SELECT COUNT(*) from question");
        return $req->execute();
    }

    public function insertQuestion($id, $question, $idNiveau) {
        $req = $this->db->prepare("INSERT INTO question (idQuestion, question, idNiveau) VALUES (:id, :question, :idNiveau)");
        $req->bindValue(':id', $id);
        $req->bindValue(':question', $question);
        $req->bindValue(':idNiveau', $idNiveau);
        $req->execute();
    }

    public function insertReponses($id, $fake1, $fake2, $fake3, $reponse) {
        $req = $this->db->prepare("INSERT INTO reponses (idQuestion, fake1, fake2, fake3, reponse) VALUES (:id, :fake1, :fake2, :fake3, :reponse)");
        $req->bindValue(':id', $id);
        $req->bindValue(':fake1', $fake1);
        $req->bindValue(':fake2', $fake2);
        $req->bindValue(':fake3', $fake3);
        $req->bindValue(':reponse', $reponse);
        $req->execute();
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