<?php

$cnx=mysqli_connect("localhost","root","","phpiitsoir") or die("Erreur de connexion");

if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $adresse=addslashes($_POST['adresse']);
    //insertion dans la base de données phpiitsoir et das la table inscription
    $req=mysqli_query($cnx,"insert into inscription (nom,prenom,adresse) values('$nom','$prenom','$adresse')");
if($req)
echo "l'inscrition est effectué avec succes!";
}

//afficher la liste des inscrits
echo "
<a href='inscription.html'>Ajouter inscrit</a>
<table border='1'>
<tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Adresse</th>
</tr>";
$req=mysqli_query($cnx,"select * from inscription");
while($tab=mysqli_fetch_assoc($req)){
    echo "<tr><td>".$tab["nom"]."</td><td>".$tab["prenom"]."</td><td>".stripslashes($tab["adresse"])."</td></tr>";
 }
 echo "</table>";
