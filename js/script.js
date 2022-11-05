function getprix(indice) {
    //alert(jour+"//"+heure);
    $.ajax({
        type: "post",
        url: "getprix.php",
        data: { indice: indice },
        success: function(result) {
            $('#prix').val(result);
        }
    });
}

function suppvente(indice) {
    var total = parseFloat($('#total' + indice).html());
    var net = parseFloat($('#net').html()) - total;
    $('#net').html(net);
    $.ajax({
        type: "post",
        url: "suppvente.php",
        data: { indice: indice },
        success: function(result) {
            $('#vente' + indice).remove();
        }
    });

}

function modifier(indice) {
    var nom = $('#nom' + indice).html();
    var prix = $('#prix' + indice).html();
    var qte = $('#qte' + indice).html();

    $('#modal-qte').val(qte);
    $('#modal-prix').val(prix);
    //$('#modal-prix').focus();
    /*$('#modal-body').on('shown.bs.modal', function() {
        setTimeout(() => {
            $('#modal-prix').focus();
        }, 5000);
    });*/
    $('#title').html(nom);

    //attr permet de cibler n'importe quel attribut 
    //d'un element html et chnger son contenu
    $('#btnmodif').attr("onclick", "valid_modif(" + indice + ")");
}

function valid_modif(indice) {
    var newprix = $('#modal-prix').val();
    var newqte = $('#modal-qte').val();
    var oldtotal = parseFloat($('#total' + indice).html());

    $.ajax({
        type: "post",
        url: "valid_modif.php",
        data: { indice: indice, qte: newqte, prix: newprix },
        success: function(result) {
            $('#prix' + indice).html(newprix);
            $('#qte' + indice).html(newqte);
            $('#total' + indice).html(newqte * newprix);
            var newtotal = newqte * newprix;
            var oldnet = parseFloat($('#net').html());
            $('#net').html((oldnet - oldtotal) + newtotal);



        }
    });
}