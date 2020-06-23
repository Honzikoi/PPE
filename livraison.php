<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <link rel = "stylesheet" style = "text/css" href = "css/mydeco.css">
</head>

<body>
<?php
require_once('bdd_connexion.php');
session_start();

if (isset($_SESSION['id']) == false or $_SESSION['id'] == 0)
    include('header.php');
else
    include('header_co.php');

if (isset($_SESSION['id']) == false or $_SESSION['id'] == 0)
    header('Location: Connexion.php');

if (isset($_POST['submit']) && isset($_GET['id_user'])) {
    $req = $bdd->prepare('DELETE FROM panier WHERE id_panier = ?');
    $req->execute(array($_GET['id_user']));
    header('Location: index.php');

}
?>

<form action="" method="post" onsubmit="return check_user_infos()" autocomplete = "on">
    <fieldset class = "fieldsetnew" autocomplete = "on">
        <legend>Livraison</legend>
        <label>Type de livraison</label></br>
        <input type = "radio" name = "livraison">Livraison express delais 48 a 72 heures pour +5€ </br>
        <input type = "radio" name = "livraison">Livraison standard delais 3 a 4 jours pour +1€</br>
        <input type = "radio" name = "livraison">Livraison relax delais plus de 5 jours gratuit</br>
        <label>Adresse de Domicile</label></br>
        Adresse:<input class = "input" type = "text" name = "adresse" placeholder = "1 Avenue Champs Elysee" maxlenght = "60"
        minlenght = "5" required>
        Departement:<input class = "input" type = "text" name = "departmnt" placeholder = "Paris" maxlenght = "30" minlenght = "3"
        required>
        Zip:<input class = "input" type = "text" name = "zip" placeholder = "75013" maxlenght = "6" minlenght = "4"
        required>
        <input type = "submit" value ="Enregistrer" id = Sub name="submit" onclick = "window.location.href = '/PPE/index.php';">
    </fieldset>