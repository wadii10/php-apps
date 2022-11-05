<?php session_start();
$jour=$_POST['jour'];
$heure=$_POST['heure'];
unset($_SESSION['tab_mat'][$jour][$heure]);
echo true;
?>
