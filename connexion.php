<?php
session_start();
require('db.php');
if(isset($_POST['ok'])){
    if (!empty($_POST['nom']) AND !empty($_POST['pass'])) {
        $nom=  htmlspecialchars($_POST['nom']);
        $pass= htmlspecialchars($_POST['pass']);

        /*$insert = $conn->prepare('INSERT INTO utilisateurs (nom_user,pass_user) VALUES (?,?)');
        $insert->execute(array($nom,$pass));*/

        $select = $conn->prepare('SELECT * FROM utilisateurs WHERE nom_user=?  AND pass_user=?');
        $select->execute(array($nom,$pass));

        if ($select->rowCount()>0) {
            $_SESSION['id_user']=$select->fetch()['id_user'];
            $_SESSION['nom_user']=$nom;
            $_SESSION['pass_user']=$pass;

            header('Location:forum.php#bas');
        }else{
            echo "Vous n'avez pas de  compte.";
        }
        
    } else {
        echo "veillez remplir tous les champs svp...";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header id="haut">
        <div class="entete2">
            <h1>FORUM</h1>
        </div>
    </header>
    <section class="contenu_inscription">
        <div class="formulaire_inscription">
            <form action=" " method="post">
                <div>
                    <h4>Connexion</h4>
                </div>
                <div>
                    <input type="text" name="nom" placeholder="Entrez votre nom...">
                </div>
                <div>
                    <input type="password" name="pass" placeholder="Entrez votre mot de passe...">
                </div>
                <input type="submit" name="ok"   value="Se connecter"><br>
                <div style="display: flex;">
                <p>pas de compte?</p>
                <a href="inscription.php">créer</a>
                </div>
            </form>
        </div>
    </section>

</body>
</html>