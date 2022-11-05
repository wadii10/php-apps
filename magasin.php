
<?php include "header.php"; ?>
<!-- Modal -->
<div class="modal fade" id="modifvente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="title"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label>Prix unitaire</label>
      <input class="form-control" type="number" id="modal-prix">
      <label>Quantite</label>
      <input class="form-control" type="number" id="modal-qte">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnmodif" onclick=""  data-bs-dismiss="modal">Modifier</button>
      </div>
    </div>
  </div>
</div>
    <div class="container">
    <?php session_start();

    //nouvelle vente
    if(isset($_GET['new'])){
    unset($_SESSION['panier']);
    }

    if(!isset($_SESSION['panier']))
    $_SESSION['panier']=[];

   include "config.php";

   //inserrer une vente dans la session
   if(isset($_POST['submit'])){
    $produit=$produits[$_POST['produit']]['nom'];
    $qte=$_POST['qte'];
    $prix=$_POST['prix'];
    //sauvegarder la vente dans session
    $_SESSION['panier'][]=['produit'=>$produit,'qte'=>$qte,'prix'=>$prix];
    header("location:magasin.php");
   }
    ?>
    <div class="form-group">
    <form method="post" action="">
            <h1>Ajouter une vente</h1>

        <div class="row mb-2">
            <div class="col-sm-12 col-md-1">
        <label>Produit</label>
    </div>
    <div class="col-sm-12 col-md-11">
        <select class="form-control" name="produit" onchange="getprix(this.value)" required>
           <option value="" disabled selected hidden>--- choisir un produit ---</option>
           <?php foreach($produits as $indice=>$produit)
            echo "<option value='".$indice."'>".$produit['nom']."</option>";
            ?>
        </select>
        </div>
</div>

        <div class="row mb-2">
    <div class="col-sm-12 col-md-1">
        <label>Prix</label>
    </div>
    <div class="col-sm-12 col-md-5">
        <input type="number"  class="form-control" name="prix" id="prix" required>
        </div>

        <div class="col-sm-12 col-md-1">
        <label>Qte</label>
    </div>
    <div class="col-sm-12 col-md-5">
        <input type="number" value="1" min="1"  class="form-control" name="qte" id="qte" required>
        </div>
</div>

<div class="col-sm-12">
    <button class="btn btn-primary" name="submit"><i class="fa fa-plus"></i> Ajouter vente</button>
<a href="magasin.php?new=1"><button type="button" class="btn btn-info">Nouvelle vente</button></a>
<button type="button" class="btn btn-warning" onclick="window.print()">Imprimer ticket</button>
</div>
    </form>

    </div>

<!-- liste des vente dans le panier -->
<h1>Liste des ventes</h1>
<table class="table table-dark table-striped">
<thead>
<tr>
    <th>Produit</th>
    <th>prix unitaire</th>
    <th>qte</th>
    <th>total</th>
    <th>action</th>
</tr>
</thead>

<tbody>

<?php $net=0;
if(!empty($_SESSION['panier'])){

foreach($_SESSION['panier'] as $indice=>$vente){
 $total= $vente['prix']*$vente['qte'];
 $net+= $total;
echo "<tr id='vente$indice'>
    <td id='nom$indice'>".$vente['produit']."</td>
    <td id='prix$indice'>".$vente['prix']."</td>
    <td  id='qte$indice'>".$vente['qte']."</td>
    <td  id='total$indice'>$total</td>
    <td>
    <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modifvente' onclick='modifier($indice)'><i class='fa fa-pencil'></i>
    </button>
    <button class='btn btn-danger' onclick=\"if(confirm('etes vous sure de supprimer?')) suppvente($indice)\"><i class='fa fa-trash'></i></button>
 
    </td>
</tr>";
}}
else{
    echo "<tr><td colspan=5 class='text-center'> pas de vente pour le moment!</td></tr>";
}
?>
</tbody>
<tfoot>
 <?php echo "<tr>
        <td colspan=3 class='text-center'>net a payer</td>
        <td colspan=2 id='net'>$net</td>
       
    </tr>";
    ?>
</tfoot>
</table>
    </div>


    <?php include "footer.php"; ?>

    