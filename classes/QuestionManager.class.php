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
        $req = $this->db->prepare("SELECT * from question");
        $req->execute();
        $res = $req->fetchAll();
        return $res[count($res) - 1]["idQuestion"];
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

    public function getQuestion($id) {
        $req = $this->db->prepare("SELECT * FROM question q JOIN reponses r on q.idQuestion = r.idQuestion where q.idQuestion = :idQuestion");
        $req->bindValue(':idQuestion', $id);
        $req->execute();

        while ($question = $req->fetch(PDO::FETCH_OBJ)) {
            $questionEnCours = new QuestionReponse($question);
        }

        if (isset($questionEnCours))
            return $questionEnCours;
    }


    public function getQuestionsReponses()
    {
        $stmt = $this->db->prepare("SELECT q.idQuestion, question, fake1, fake2, fake3, reponse, idReponse FROM question q INNER JOIN reponses r ON r.idQuestion = q.idQuestion");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $question, $fake1, $fake2, $fake3, $reponse, $niveau) {
        $questionUpdate = $this->db->prepare("UPDATE question SET question = :question, idNiveau = :niveau where idQuestion = :idQuestion");
        $questionUpdate->bindParam(':idQuestion', $id, PDO::PARAM_INT);
        $questionUpdate->bindParam(':question', $question, PDO::PARAM_STR);
        $questionUpdate->bindParam(':idNiveau', $niveau, PDO::PARAM_INT);
        $questionUpdate->execute();


        $reponseUpdate = $this->db->prepare("UPDATE reponses SET fake1 = :fake1, fake2 = :fake2, fake3 = :fake3, reponse = :reponse  where idQuestion = :idQuestion");
        $reponseUpdate->bindParam(':fake1', $fake1, PDO::PARAM_STR);
        $reponseUpdate->bindParam(':fake2', $fake2, PDO::PARAM_STR) ;
        $reponseUpdate->bindParam(':fake3', $fake3, PDO::PARAM_STR);
        $reponseUpdate->bindParam(':reponse', $reponse, PDO::PARAM_STR);
        $reponseUpdate->bindParam(':idQuestion', $id, PDO::PARAM_INT);
        $reponseUpdate->execute();
    }

    public function supprimerQuestion($id) {
        $reponseDelete = $this->db->prepare("DELETE FROM `reponses` WHERE `idQuestion` = :idQuestion");
        $reponseDelete->bindParam(':idQuestion', $id, PDO::PARAM_INT);
        $reponseDelete->execute();
        $questionDelete = $this->db->prepare("DELETE FROM `question` WHERE `idQuestion` = :idQuestion");
        $questionDelete->bindParam(':idQuestion', $id, PDO::PARAM_INT);
        $questionDelete->execute();
    }

    public function generateXml() {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        //create the main tags, without values
        $quiz = $dom->createElement('quiz');
        $quiz->setAttribute("name","TestQuiz");
        $questions = $dom->createElement('questions');
        $quiz->appendChild($questions);

        $questionsReponses = $this->getQuestionsReponses();

        $i = 1;
        foreach ($questionsReponses as $qr) {
            $question = $dom->createElement("question");
            $question->setAttribute('rank', strval($i));
            $libelle = $dom->createElement('name', $qr['question']);
            $fake1 = $dom->createElement('answerWrong', $qr['fake1']);
            $fake2 = $dom->createElement('answerWrong', $qr['fake2']);
            $fake3 = $dom->createElement('answerWrong', $qr['fake3']);
            $reponse = $dom->createElement('answerRight', $qr['reponse']);

            $questions->appendChild($question);
            $question->appendChild($libelle);
            $question->appendChild($fake1);
            $question->appendChild($fake2);
            $question->appendChild($fake3);
            $question->appendChild($reponse);

            $i++;
        }

        $dom->appendChild($quiz);
        $dom->save('quiz.xml');
    }

}

?>