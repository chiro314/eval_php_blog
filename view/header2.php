<?php
session_start();
$loggedin = false;
$login = "";
$userType = ""; //(admin, user)
$userStatus = ""; //(actif, bloqué)

if(isset($_SESSION["login"])){
    $login = $_SESSION["login"];
    $userType = $_SESSION["type"]; //(admin, user)
    $userStatus = $_SESSION["status"]; //(actif, bloqué)
    $loggedin = true;
    if($userType == "admin"){
        $hello = "Bienvenue ".$login." et bonne intendance !";
        $helloFooter = "Bonne intendance !";
    }
    else { //$userType == "user"
        $hello = "Bienvenue ".$login." et bonne visite !";
        $helloFooter = "Bonne visite !";
    } 
}
else { // $loggedin == false
        $hello = "Bienvenue ! Visitez, connectez-vous ou créez un compte !";
        $helloFooter = "Bonne visite !";
}

require "controller/functions.php";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>EXAM-BLOG</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/> <!--Responsive-->
    <link rel="stylesheet" href="view/style7.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div id="container">
    <header>
        <div id="div-h1">
            <h1 id="h1-title" class="text-center py-2">Rire et écrire</h1>
        </div>
        <div id="div-hello"><p class="text-center"><?php echo $hello ?></p></div>
        <div id="div-menu" class="text-center">
            <?php if($loggedin){ 
                if ($userType == "user"){ ?>
                    <a class="button" type="button" href="index2.php?controller=article&action=siteList">Articles</a>
                <!--<a class="button" type="button" href="index2.php?controller=user&action=password">Changer de mot de passe</a>-->
                    <a class="button" type="button" href="index2.php?controller=user&action=disconnection">Quitter</a>
            <?php }
                else{ // "admin" ?>
                <!--<a class="button" type="button" href="index2.php?controller=user&action=password">Maj psw</a>-->
                    <a class="button" type="button" href="index2.php?controller=user&action=registration&type=admin">Créer Admin</a>
                <!--    <a class="button" type="button" href="index2.php?controller=user&action=list">Utilisateurs</a>-->
                <!--    <a class="button" type="button" href="index2.php?controller=theme&action=list">Thèmes</a>-->
                    <a class="button" type="button" href="index2.php?controller=article&action=list">Articles</a>
                    <a class="button" type="button" href="index2.php?controller=comment&action=list">Commentaires</a>
                    <a class="button" type="button" href="index2.php?controller=article&action=siteList">Site</a>
                    <a class="button" type="button" href="index2.php?controller=user&action=disconnection">Quitter</a>
                <?php }
            }
            else { // $loggedin == false ?>
                <!-- <a class="button" type="button" href="articles.php">Articles</a> -->
                <a class="button" type="button" href="index2.php?controller=article&action=siteList">Articles</a>
                <a class="button" type="button" href="index2.php?controller=user&action=connection">Se connecter</a>
                <a class="button" type="button" href="index2.php?controller=user&action=registration&type=user">S'inscrire</a>
            <?php } ?>
        </div>
    </header>
