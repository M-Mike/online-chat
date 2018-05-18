<?php
/*
Ce fichier est pour envoyer les messages vers la table où l'on stoque les messages, ici "posts"
Il est placé comme action dans le homepage pour le submit button
*/

session_start();//pour démarrer la session et garder en mémoire les variables de session
include ("config.php");//pour se connecter à la base de donnée
//$msg=$_POST['msg'];
//$uname=$_SESSION['username'];
$msg = mysqli_real_escape_string($link, $_POST['msg']);
$uname = mysqli_real_escape_string($link, $_SESSION['username']);

$sql="insert into posts(msg,username) values ('$msg','$uname')";
$result=$link->query($sql);

header("Location:home.php");

?>
