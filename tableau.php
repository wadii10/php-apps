<?php
//<=php7.x
$tab=array(10, 17, 14); 
//>=php 8.x

//tableau indicé ou indexé
//declarer un tableau vide
$tab=[]; 
$tab[]=14;
$tab[]=16;
$tab[]=10;
$tab[]=8;
$tab[]=14;
$tab[]=16;
$tab[]=10;
$tab[]=8;
//vider la case 2
$tab[2]="";
//supprimer la case 2
unset($tab[2]);
//print_r($tab);
echo "<table border='1'>
<tr>";
//utiliser foreach
/*foreach($tab as $val){
    echo "<td>$val</td>";
}*/
//utiliser la boucle for
for($i=0; $i<count($tab);$i++){ //ou sizeof($tab)
    if(isset($tab[$i]))
    echo "<td>$tab[$i]</td>";
}
echo "</tr>
</table>";

//tableau associatif
echo "<hr>";
$tab2=['nom'=>'abid', 'prenom'=> 'mohamed','email'=>'abc@gmail.com'];
$tab2["tel"]=22000001;
//print_r($tab2);
echo "<table border='1'>";
foreach($tab2 as $key=>$value)
echo "<tr>
    <th>$key</th>
    <td>$value</td>
</tr>";

echo "</table>";

//tableau multidimension
echo "<hr>";
$tab3=['java'=>[14,15,13],'uml'=>[16,12,15],'php'=>[13,17,16]];
//ajouter une case dans le tableau
//$tab3['html']=[13,18];
//2eme methode
$tab3['html'][]=13;
$tab3['html'][]=18;
$tab3['html'][]=13;

//print_r($tab3);
echo "<table border='1'>
<tr>
    <th>Matiere</th>";
    foreach($tab3 as $mat=>$notes)
{
    for($i=1;$i<=count($notes);$i++)
    echo "<th>Note$i</th>";

    break;
}  
    
    echo "<th>Moyenne</th>
</tr>";

foreach($tab3 as $matiere=>$notes)
{
    $moyenne=0;
    foreach($notes as $note)
    $moyenne+=$note;
    
    $moyenne/=count($notes);

 echo "
 <tr>";
 echo "<td>$matiere</td>";
 foreach($notes as $note)
    echo "<td>$note</td>";
    echo "<td>".number_format($moyenne,2,',','')."</td>
 </tr>";  
}
echo "</table>";
?>