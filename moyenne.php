<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $tab_etud=["mohamed"=>[12,11,14],"ali"=>[9,13,16],"mourad"=>[11,11,16]];
$coef=[1,1,2];
    echo "<table border='1'>
    <tr>
        <th>Etudiants</th>
        <th>NC</th>
        <th>NO</th>
        <th>NE</th>
        <th>Moyenne</th>
    </tr>";
    foreach($tab_etud as $etudiant=>$notes){
        echo "<tr>
        <td>$etudiant</td>";
    $somme=0; 
    $coefs=0;   
for($i=0;$i<count($notes);$i++){
    $coefs+=$coef[$i];
$somme+=$notes[$i]*$coef[$i];
        echo "<td>$notes[$i]</td>";
}
$moy=$somme/$coefs;
        echo "<td>$moy</td>
        </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>