<?php
session_start();

require('db.php');
if(isset($_POST['ok'])){
    if (!empty($_POST['nom']) AND !empty($_POST['pass'])AND !empty ($_FILES['photo']['type']=='image/png')) {
        
            $img2=$_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$img2);
        
        }
        else{
            echo "utilisez une extension pdf pour les documents et png pour les images svp";
        }
        
        $nom=  htmlspecialchars($_POST['nom']);
        $pass= htmlspecialchars($_POST['pass']);
        

        $insert = $conn->prepare('INSERT INTO utilisateurs (nom_user,pass_user,photo) VALUES (?,?,?)');
        $insert->execute(array($nom,$pass,$img2));

        header('Location:connexion.php');
    } else {
        echo "veillez remplir tous les champs svp...";
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
        <div class="entete1">
            <h1>FORUM</h1>
        </div>
</header>
    <section class="contenu_inscription">
        <div class="formulaire_inscription">
            <form action=" " method="post" enctype="multipart/form-data">
                <div>
                    <h4>Inscription</h4>
                </div>
                <div>
                    <input type="text" name="nom" placeholder="Entrez votre nom...">
                </div>
                <div>
                    <input type="password" name="pass" placeholder="Entrez votre mot de passe...">
                </div>
                <label for="">votre photo:</label>
                <input type="file" name="photo" required><br>
                
                
                <input type="submit" name="ok"   value="S'inscrire">
            </form>
        </div>
    </section>

</body>
</html>