function recValue(id, table, field, value) {
//    $('div.alert').html(attr1 + attr2 + attr3);
    $.post("/codeigniter/index.php/admin/ajaxupdatevalue", {
        id: id,
        table: table,
        field: field,
        value: value
    }, function(data) {
        if ( data == 1 )
            $("div.alert").fadeIn(500).html("Valeur modifiee").delay(2000).fadeOut(500);
    });

}

function recNewValue(table, userid) {
    $.post("/codeigniter/index.php/admin/ajaxaddline", {
        table: table,
        userid: userid,
        datas: $("form#adminFormAddLine").serialize()
    }, function(data) {
        $("tr.adminFormAddLineTR").children("td").each(function() {
            $(this).children("input, textarea").val("").removeAttr('checked').removeAttr("selected");
        });
        $(".adminFormAddLineTR").before(data);
        $("div.alert").fadeIn(500).html("Ligne inseree").delay(2000).fadeOut(500);
        
     });
}

function delValue(table, id) {
    if ( confirm("Supprimer l'élément " + id + " de la table " + table + " ?") ) {
        $.post("/codeigniter/index.php/admin/ajaxremoveline", {
            table: table,
            id: id
        }, function(data) {
            $(".line_"+id).remove();
            $("div.alert").fadeIn(500).html("Ligne supprimee").delay(2000).fadeOut(500);
        });
    }
    
}