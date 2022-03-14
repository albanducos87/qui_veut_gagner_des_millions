<?php

class ReponseManager {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getReponses($idQuestion) {
        $req = $this->db->prepare("SELECT * FROM reponses WHERE idQuestion = :idQuestion");
        $req->bindValue(':idQuestion', $idQuestion);
        $req->execute();

        while ($reponse = $req->fetch(PDO::FETCH_OBJ)) {
            $reponseEnCours['idReponse'] = $reponse->idReponse;
            $reponseEnCours['fake1'] = $reponse->fake1;
            $reponseEnCours['fake2'] = $reponse->fake2;
            $reponseEnCours['fake3'] = $reponse->fake3;
            $reponseEnCours['reponse'] = $reponse->reponse;
        }

        if (isset($reponseEnCours))
            return $reponseEnCours;
    }

    public function indice5050($idPartie) {
        $req = $this->db->prepare("UPDATE partie SET indice5050 = 1 WHERE idPartie = :idPartie");
        $req->bindValue(':idPartie', $idPartie);
        $req->execute();

        $arrayIndices = array(1,2,3);
        $i = 0;
        foreach( array_rand($arrayIndices, 2) as $key ) {
            $res[$i] = $arrayIndices[$key];
            $i++;
        }

        return $res;
    }
}

?>