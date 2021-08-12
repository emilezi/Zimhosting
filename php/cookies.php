<?php
if((isset($_COOKIE['prenom'])) && (isset($_COOKIE['nom'])) && (isset($_COOKIE['pseudo'])) && (isset($_COOKIE['email'])) && (isset($_COOKIE['class'])) && (isset($_COOKIE['profil_picture']))){

$_SESSION['prenom'] = $_COOKIE['prenom'];
$_SESSION['nom'] = $_COOKIE['nom'];
$_SESSION['pseudo'] = $_COOKIE['pseudo'];
$_SESSION['email'] = $_COOKIE['email'];
$_SESSION['class'] = $_COOKIE['class'];
$_SESSION['profil_picture'] = $_COOKIE['profil_picture'];

}
?>