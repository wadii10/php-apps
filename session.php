<?php
session_start();
$_SESSION['x']=5;
$_SESSION['tab'][]=["math"=>12,"anglais"=>10];
echo $_SESSION['x'];
?>