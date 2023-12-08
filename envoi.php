<?php
    require('db.php');
    if(isset($_POST['ok'])){
        if(!empty($_POST['sms'])){
            $sms=$_POST['sms'];
            $id=$_SESSION['nom_user'];
            $insert= $conn->prepare('INSERT INTO messages (contenu_sms,id_user) VALUE (?,?)');
            $execute=$insert->execute(array($sms,$id));
            header('Location:forum.php#bas');
        }else{
            echo "veuillez entrez un message";
            
        }
    }
?>