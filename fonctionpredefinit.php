<?php 
//afficher la date du jour
echo date("d/m/Y H:i:s a");

//envoyer un email multiple
$emails="aaa@gmail.com;bbb@gmail.com;ccc@gmail.com";
$tabemail=explode(';',$emails);
foreach($tabemail as $email){
$subject="hello!";
$message="ceci est un email de test!";
    mail($email,$subject,$message);
}

$chainemail=implode('/',$tabemail);
echo $chainemail;
echo "<hr>";
//do while
$tab=[10,14,5,18];

$j=0;
do{
    echo $tab[$j];
    $j++;
}while($tab[$j]>=10);

echo "<hr>";
//foreach modele 1
$tab1=[14,16,10,17];
foreach($tab1 as $note){
    echo $note.",";
}
echo "<hr>";
//foreach modele2
$tab2=["nom"=>"abid","prenom"=>"mohamed","email"=>"test@gmail.com"];
foreach($tab2 as $indice=>$valeur){
    echo "votre $indice est $valeur<br>";
}

?>