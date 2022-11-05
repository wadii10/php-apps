<?php session_start();
$_SESSION['panier'][$_POST['indice']]['qte']=$_POST['qte'];
$_SESSION['panier'][$_POST['indice']]['prix']=$_POST['prix'];
echo true;
?>