<?php
session_start();
if(!$_SESSION['pass_user'] AND !$_SESSION['nom_user']){
    header('Location:connexion.php');
}else{
    require('db.php');
    if(isset($_POST['ok'])){
        if(!empty($_POST['sms'])){
            $sms=htmlspecialchars($_POST['sms']);
            $new_sms=wordwrap($sms,60,'<br>',60);
            $t=0;
            
                $lignes=explode("<br>",$new_sms);
            //$new1_sms=substr_replace($new_sms,"<br>",60,0);
            $new1_sms= " ";

            foreach($lignes as $ligne){
                while($t<=5){
                    $ligne_formatee=substr_replace($ligne,"<br>",60,0);
                    $t++;
                }
                $new1_sms .=$ligne_formatee;
                
            }
            
            
            $id=$_SESSION['nom_user'];
            
                $affiches = $conn->prepare('SELECT photo FROM utilisateurs WHERE nom_user=?');
                $affiches->execute(array($id));
                $data = $affiches->fetchAll(PDO::FETCH_OBJ);
                foreach($data as $data){
                    $photo=$data->photo;
                
                
            $insert= $conn->prepare('INSERT INTO messages (contenu_sms,nom_user,photo) VALUE (?,?,?)');
            $execute=$insert->execute(array($new1_sms,$id,$photo));
        }
            header('Location:forum.php#bas');
        }else{
            echo "veuillez entrez un message";
            
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
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>
    <header id="haut">
        <div class="entete">
            <div>
            <h1>FORUM</h1>
            <div style="display: flex;overflow:hidden;overflow:unset;">
            <?php
                $affiches = $conn->prepare('SELECT * FROM utilisateurs ORDER BY nom_user');
                $affiches->execute();
                $data = $affiches->fetchAll(PDO::FETCH_OBJ);
                foreach($data as $data):
            ?>
            <h4><?=$data->nom_user?>&nbsp;,&nbsp;</h4>
            <?php
            endforeach;
            ?>
            </div>
            
            </div>
            
            <div>
                <div style="display: flex;">
                <?php
                $affiches = $conn->prepare('SELECT * FROM utilisateurs WHERE nom_user=?');
                $affiches->execute(array($_SESSION['nom_user']));
                $data = $affiches->fetchAll(PDO::FETCH_OBJ);
                foreach($data as $data):
            ?>
            <img src="images/<?=$data->photo?>" width="50px" style="border-radius:50%;">
            <?php
            endforeach;
            ?>
                <div style="display: flex;justify-content:center;align-items:center;">
                <h3>~<?=$_SESSION['nom_user']?>~ &nbsp;&nbsp;&nbsp;&nbsp;<a href="deconnexion.php" class="deconnexion">Deconnexion</a></h3>
                </div>
                
        
                </div>
            </div>
        </div>
        
    </header>
    <div class="fond">
        <div class="formulaire">
            <form action=" " class="formm" method="post">
            
                
                <div style="display: flex;box-shadow: 0 0 2px rgba(0 ,0,0,0.3);">
                    <textarea name="sms" id="" cols="5" rows="2" placeholder="Entrez votre message..."></textarea>
                </div>
                
                <div style="display: flex;justify-content:space-between; width:100%;">
                    
                    <input type="submit" name="ok"   value="Envoyer">
                    
                </div>
                
                
            </form>
            
        </div>
        
    </div>
    <div id="bas" style="position: absolute; bottom:0px;right:0px;"> </div>
            
        <div class="disc">
        <section class="contenu">
            
        <div class="affiche_sms">
            <div style="display: flex;justify-content:center;align-items:center;padding:10px;border-radius:2px;background:rgba(173,173,173,0.2)">
            <?php
                $di= date('Y/m/d');
                echo $di;
                ?>
            </div>
            <?php
                $affiches = $conn->prepare('SELECT * FROM messages ORDER BY id_sms');
                $affiches->execute();
                $data = $affiches->fetchAll(PDO::FETCH_OBJ);
                foreach($data as $data):
                ?>
                
                <?php 
                    if($_SESSION['nom_user']== $data->nom_user ){
                ?>
                
                <div class="box1" style="display: block;width:100%">
                <div class="box1">
                    <h4 class="nom1">~<?=$data->nom_user?>~</h4>
                    <h1 class="sms1">
                        <?= $data->contenu_sms ?>
                    </h1>
                    <p><b><?=$data->datejour?></b></p>
                </div>
                    
                </div>
                
                
                
                <?php 
                }else{
                    ?>
                    
                        <div class="box" style="display: block;width:100%">
                        <div class="box">
                            <div style="display: flex;margin-bottom:5px;">
                            <img src="images/<?=$data->photo?>" width="30px" style="border-radius:50%;">
                        <h4 class="nom">~<?=$data->nom_user?>~</h4>
                            </div>
                            
                        <h1 class="sms">
                            <?= $data->contenu_sms ?>
                        </h1>
                        <p><b><?=$data->datejour?></b></p>
                        </div>
                        
                        </div>
                    <?php
                }?>
                <?php
                endforeach;
            ?>
        </div>
        
    </section>
    </div>
</body>
</html>
<?php
}
?>