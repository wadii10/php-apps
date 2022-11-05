<?php include "header.php"; ?>

<?php
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];

    print_r($_FILES['photo']);
    exit;
}
?>
<form method="post" action="ajouter_produit.php" enctype="multipart/form-data">
    Photo produit
    <input type="file" class="form-control" name="photo" required>
    Nom produit
    <input type="text" class="form-control" name="nom" required>
    Prix produit
    <input type="text" class="form-control" name="prix" required>
    <button class="btn btn-primary" name="submit">Ajouter</button>
</form>

<?php include "footer.php"; ?>