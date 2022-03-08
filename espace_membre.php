
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>espace membre</title>
</head>
<body>

<?php
 echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'];


?>
<p> Modification du profil</p>
<form action="UtilisateurMi.php" method="post">

    <p>

       Veuillez entrer votre nouveau nom: <input type="text" name="nom" />
        Veuillez entrer votre nouveau prenom: <input type="text" name="prenom" />
        Veuillez entrer votre nouveau code postal:<input type="text" name="cp" />
        Veuillez entrer votre nouvelle ville:<input type="text" name="ville" />
        Veuillez entrer votre nouvelle adresse:<input type="text" name="adresse" />
        Veuillez entrer votre nouveau login:<input type="text" name="login" />
        Veuillez entrer votre nouveau mot de passe: <input type="text" name="mdp" />

        <input type="submit" value="Valider" />
        <?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'];
        echo 'Vos nouveaux nom et prenom sont:'. $_SESSION['nom'].''. $_SESSION['prenom'];
        ?>
    </p>

</form>

</body>
</html>