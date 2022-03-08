<?php

class UtilisateurI
{



    private $id_UtilisateurI;
    private $nom;
    private $prenom;
    private $cp;
    private $ville;
    private $adresse;
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


    public function __Construct($id_UtilisateurI, $nom, $prenom, $cp,  $ville, $adresse, $login, $mdp)
    {
        $this->id_UtilisateurI = $id_UtilisateurI;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->adresse = $adresse;
        $this->login = $login;
        $this->mdp = $mdp;

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

    public function Inscription($nom, $prenom,$cp,$ville,$adresse,$login,$mdp)
    {

        session_start();

        $bdd = new PDO('mysql:host=localhost;dbname=projetvol;charset=utf8', 'root', '');
        $req=$bdd->prepare('SELECT * FROM user WHERE mail = :mail');
        $req->execute(array(
            'mail'=>$_POST['mail']

        ));

        $res = $req->fetch();

        if($res){
            echo 'compte existant';
        }
        else {

            $requete = $bdd->prepare('INSERT INTO user (nom, prenom,cp,ville,adresse,login,mdp) VALUES (:nom, :prenom,:cp,:ville,:adresse,:login,mdp)');
            $requete->execure(array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'cp' => $_POST['cp'],
                'ville' => $_POST['ville'],
                'adresse' => $_POST['adresse'],
                'login' => $_POST['login'],
            'mdp' => $_POST['mdp'],
                
                
            ));
        }

    }
}