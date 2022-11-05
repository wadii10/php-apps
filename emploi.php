<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <style>
        @media print{
            form,button{
                display: none;
            }
        }
    </style>
</head>
<body>

    <?php
    session_start();
    if(isset($_POST['new'])){
session_destroy();
//unset($_SESSION['tab_mat']);
header("location:emploi.php");
    }
    $tabheures=["08-09","09-10","10-11","11-12","12-13","13-14","14-15","15-16","16-17","17-18"];
    $tabjours=["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"];

    //unset($_SESSION['x']);
    //session_destroy();
    //echo $_SESSION['x'];
    //print_r($_SESSION['tab']);
?>
<form method="post">
    jour
    <select name="jour" id="jour" required>
        <option value="">--- choisir le jour ---</option>
        <?php foreach($tabjours as $jour)
        echo "<option value='$jour'>$jour</option>";
        ?>
    </select>

    heure
    <select name="heure" id="heure" required>
        <option value="">--- choisir l'heure ---</option>
        <?php foreach($tabheures as $heure)
        echo "<option value='$heure'>$heure</option>";
        ?>
    </select>

    Matiere
    <input type="text" name="matiere">

    <button name="submit">Ajouter</button>
</form> 
<form method="post">
<button name="new">Nouveau emploi</button>
</form>
<button type="button" onclick="window.print()">Imprimer</button>

<?php
    if(isset($_POST['submit'])){
$jour=$_POST['jour'];
$heure=$_POST['heure'];
$matiere=$_POST['matiere'];
$_SESSION['tab_mat'][$jour][$heure]=$matiere;
    }

    //$tab_mat=array("Lundi"=>array('08-09'=>'Math','09-10'=>'info','10-11'=>'java'),"Mardi"=>array('08-09'=>'français','11-12'=>'php','14-15'=>'java'),"Mercredi"=>array('08-09'=>'physique','13-14'=>'anglais','15-16'=>'Anglais'));
//echo $tab_mat["Lundi"]['08-09'];
    echo "<table border='1' width='100%' height='500'>
    <tr>
        <th></th>";
foreach($tabheures as $heure)
        echo "<th>$heure</th>";
    
    echo "</tr>";

    foreach($tabjours as $jour){
    echo "<tr>
        <th>$jour</th>";
        foreach($tabheures as $heure){
            if(isset($_SESSION['tab_mat'][$jour][$heure]))
        echo "<td id='$jour$heure'>".$_SESSION['tab_mat'][$jour][$heure]." <button onclick=\"suppmat('$jour','$heure')\">X</button></td>";
        else
        echo "<td></td>";
        }

    echo "</tr>";
    }
    echo "</table>";
?>

<script>
function suppmat(jour,heure){
    //alert(jour+"//"+heure);
$.ajax({
    type:"post",
    url: "suppmat.php", 
    data:{jour:jour,heure:heure},
    success: function(result){
        //avec js
        //document.getElementById(jour+heure).innerHTML="";
        //avec jquery
        $('#'+jour+heure).html("");
    }
});
}
</script>

    </body>
</html>