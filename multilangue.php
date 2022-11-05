<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="multilangue.php?lang=fr">FR</a>
    <a href="multilangue.php?lang=en">EN</a>
    <a href="multilangue.php?lang=it">IT</a>
    <?php
    $chaine_fr='bonjour';
    $chaine_en="goodmorning";
    $chaine_it="buonjorno";

    if(isset($_GET['lang'])){
        
        $lang=$_GET['lang'];
        
        /*if($lang=='fr')
        echo $chaine_fr;
        elseif($lang=='en')
        echo $chaine_en;
        elseif($lang=='it')
        echo $chaine_it;*/

//$nom_var="chaine_".$lang;
        //echo $$nom_var;

        echo ${"chaine_$lang"};

    }
    ?>
</body>
</html>