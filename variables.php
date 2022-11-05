<?php
//echo $_SERVER['REMOTE_ADDR'];

//phpinfo();
//varible dynamique
$note=13;
$nom_var="note";
echo $$nom_var;
echo "<br>";
echo ${$nom_var};
?>