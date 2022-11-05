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
    //declarer la fonction qui retourne la mention selon une moyenne donnée
    function mention($moyenne){
        $mention="";
if($moyenne >=10 && $moyenne<12)
$mention="passable";
elseif($moyenne >=12 && $moyenne<14)
$mention="Assez bien";
elseif($moyenne >=14 && $moyenne<16)
$mention="bien";
elseif($moyenne >=16 && $moyenne<18)
$mention="tres bien";
elseif($moyenne >=18 && $moyenne<=20)
$mention="excelent";
else
$mention="refusé";

return $mention;
    }
//avec switch case
    function mention2($moyenne){
        switch(true){
        case $moyenne >=10 && $moyenne<12 : return "passable";
        break;
        case $moyenne >=12 && $moyenne<14 : return "assez bien";
        break;
        case $moyenne >=14 && $moyenne<16 : return "bien";
        break;
        case $moyenne >=16 && $moyenne<18 : return "tres bien";
        break;
        case $moyenne >=18 && $moyenne<20 : return "excellent";
        break;
        default:return "refusé";
        break;
        }
    }

    $tab_etud=array("mohamed"=>array("java"=>array(11.5,14.5,16), "php"=>array(14,13.5,12),
    "html"=>array(15,10.5,8)), "ali"=>array("java"=>array(17.5,18,15),
    "php"=>array(18,18,20), "html"=>array(17,16.5,15)));
    $coef=[1,1,2];
    foreach($tab_etud as $etudiant=>$mats){
        echo "<h1>$etudiant</h1>";
        echo "<table border='1'>
        <tr>
            <th>Matieres</th>
            <th>NO</th>
            <th>NC</th>
            <th>NE</th>
            <th>Moyenne</th>
        </tr>";
        $sommemoy=0;
        foreach($mats as $mat=>$notes){
            echo "<tr>
        <td>$mat</td>";
    $somme=0; 
    $coefs=0;   
for($i=0;$i<count($notes);$i++){
    $coefs+=$coef[$i];
$somme+=$notes[$i]*$coef[$i];
        echo "<td>$notes[$i]</td>";
}
$moy=$somme/$coefs;
$sommemoy+=$moy;
        echo "<td>".number_format($moy,2,',','')."</td>
        </tr>";
        }
        $mg=$sommemoy/count($mats);
echo "<tr><th colspan='4'>Moyenne generale</th><td>".number_format($mg,2,',','')."</td></tr>";
echo "<tr><td colspan='5'>". mention2($mg)."</td></tr>";      
echo "</table>";
    }
    ?>
</body>
</html>