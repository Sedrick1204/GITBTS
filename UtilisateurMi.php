<?php

$bdd = new PDO('mysql:host=localhost;dbname=projetvol;charset=utf8', 'root', '');

$req = $bdd->prepare('Update Utilisateur Set nom=:nom,prenom=:prenom,cp=:cp,ville=:ville,adresse=:adresse,login=:login,mdp=:mdp where id_UtilisateurI=:id_UtilisateurI');
$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'cp' => $_POST['cp'],
    'ville' => $_POST['ville'],
    'adresse' => $_POST['adresse'],
    'login' => $_POST['login'],
    'mdp' => $_POST['mdp']
));
$res = $req->fetch();
echo 'Modification terminee';
?>