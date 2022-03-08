<?php

class UtilisateurC
{
    private $id_UtilisateurC;
    private $login;
    private $mdp;



    public function getId_UtilisateurC()
    {
        return $this->id_UtilisateurC;
    }


    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login)
    {
        $this->login = $login;
    }


    public function getMdp()
    {
        return $this->mdp;
    }

    
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }



    public function __Construct($id_UtilisateurC,$login,$mdp)
    {
        $this->id_UtilisateurC= $id_UtilisateurC;
        $this->login=$login;
        $this->mdp=$mdp;

    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                
                $this->$method($value);
            }
        }
    }
    public function Connexion($login, $mdp){

        session_start();

        $bdd = new PDO('mysql:host=localhost;dbname=projetvol;charset=utf8', 'root', '');

        $req = $bdd->prepare('SELECT * FROM user WHERE login = :login AND mdp = :mdp');
        $req->execute(array(
            'login' => $_POST['login'],
            'mdp' => $_POST['mdp']
        ));

        $res = $req->fetch();

        if ($res) {
            $_SESSION['login'] = $res['login'];
            $_SESSION['mdp'] = $res['mdp'];
            header('Location: espace_membre.php');
        } else {
            header('Location: form.html');
        }

    }
}