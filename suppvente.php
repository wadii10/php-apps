<?php session_start();
unset($_SESSION['panier'][$_POST['indice']]);
echo true;
?>