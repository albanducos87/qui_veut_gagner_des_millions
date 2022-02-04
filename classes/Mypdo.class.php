<?php
class Mypdo extends PDO
{

    protected $dbo;

    public function __construct ()
    {
        // le paramétrage de cette classe se fait dans le fichier connexion.php
        if (ENV=='dev'){
            $bool=true;
        }
        else
        {
            $bool=false;
        }
        try {
            $this->dbo =parent::__construct("mysql:host=localhost"."; dbname=qvgdm_base", "root", "root",
                array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => $bool, PDO::ERRMODE_EXCEPTION => $bool));
            $req = "SET NAMES UTF8;";
            $resu = PDO::query($req);

        }
        catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }

    }

}

?>

