var minuscule = new RegExp("[a-z]+", "");
var majuscule = new RegExp("[A-Z]+", "");
var chiffre = new RegExp("[0-9]+", "");

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

function recPersonalInfos(id_contact) {
    $.post("/codeigniter/index.php/admin/ajaxmodifypersonalinfos", {
        id_contact: id_contact,
        table: 'contact',
        datas: $("#personalInfosModif").serialize()
    }, function(data) {
        if ( data == 1 )
            $("div.alert").fadeIn(500).html("Données mises à jour").delay(2000).fadeOut(500);
    })
}

function modifyPersonalPassword(id_user) {
    
    if ( $("#accessInfosModif").find("#new_password_1").val() != $("#accessInfosModif").find("#new_password_2").val() ) {
        $("div.alert").fadeIn(500).html("Les 2 mots de passe saisis sont différents ! Merci de recommencer").delay(2000).fadeOut(500);
        $("#accessInfosModif").find("#new_password_1").val("");
        $("#accessInfosModif").find("#new_password_2").val("");
    } else if (minuscule.test($("#accessInfosModif").find("#new_password_1").val()) == false ||
               majuscule.test($("#accessInfosModif").find("#new_password_1").val()) == false ||
               chiffre.test($("#accessInfosModif").find("#new_password_1").val()) == false ||
               $("#accessInfosModif").find("#new_password_1").val().length < 8 ) {
        $("div.alert").fadeIn(500).html("Le mot de passe n'est pas conforme aux règles de sécurité").delay(2000).fadeOut(500);
        $("#accessInfosModif").find("#new_password_1").val("");
        $("#accessInfosModif").find("#new_password_2").val("");
    } else {
        $.post("/codeigniter/index.php/admin/ajaxmodifypassword", {
            id_user: id_user,
            table: 'user',
            newpass: $("#accessInfosModif").find("#new_password_1").val()
        }, function(data) {
            $("div.alert").html(data);
            if ( data == 1 ) {
                $("div.alert").fadeIn(500).html("Mot de passe modifié").delay(2000).fadeOut(500);
                document.location = "/codeigniter/index.php/index";
            }
    })
        
    }
}

function grantAccess(id_user, action, is_checked) {
    $.post("/codeigniter/index.php/admin/ajaxgrantaccess", {
        id_user: id_user,
        action: action,
        is_checked: is_checked
    }, function(data) {
        $("div.alert").fadeIn(500).html("Modification enregistrée").delay(2000).fadeOut(500);
    });
}

function newContact(admin) {
    if ( $("#accessInfosCreate").find("#new_password_1").val() != $("#accessInfosCreate").find("#new_password_2").val() ) {
        $("div.alert").fadeIn(500).html("Les 2 mots de passe saisis sont différents ! Merci de recommencer").delay(2000).fadeOut(500);
        $("#accessInfosCreate").find("#new_password_1").val("");
        $("#accessInfosCreate").find("#new_password_2").val("");
    } else if (minuscule.test($("#accessInfosCreate").find("#new_password_1").val()) == false ||
               majuscule.test($("#accessInfosCreate").find("#new_password_1").val()) == false ||
               chiffre.test($("#accessInfosCreate").find("#new_password_1").val()) == false ||
               $("#accessInfosCreate").find("#new_password_1").val().length < 8 ) {
        $("div.alert").fadeIn(500).html("Le mot de passe n'est pas conforme aux règles de sécurité").delay(2000).fadeOut(500);
        $("#accessInfosCreate").find("#new_password_1").val("");
        $("#accessInfosCreate").find("#new_password_2").val("");
    } else {

        $.post("/codeigniter/index.php/index/ajaxnewcontact", {
            datas: $("form#accessInfosCreate").serialize(),
            admin: admin
        }, function(data) {
            $("div.alert").html(data);
            //$("div.alert").fadeIn(500).html("Compte client créé").delay(2000).fadeOut(500);
        });    
    }
}

function createAccount(url) {
    document.location = url + "index.php/index/create";
}