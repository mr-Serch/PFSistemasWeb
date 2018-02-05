// Variables globales var MAXNUMFILES = 1; var MAXIMAGESIZE = 1;
var EXTENSIONESIMAGEN = ".jpg,.png,.pdf";
var FOTOGRAFIA = 1;
var MAXNUMFILES = 1;
var MAXIMAGESIZE = 1024;
// Funciones Globales
$(document).ready(function () { MenuSistema();});
function MenuSistema() {
    // Activa el menu actual
    $(".navbar-nav li:contains('" + $('.menu-activo').text() + "')").addClass('active');
    }
function DibujaComentarios( boton, id ) {
    var url = "index.php?controller=botones&action=botoncomentarios"; var method = "POST";
    var data = { id: id };
    ajaxHelper(url, method, data).done(function (data, status, jqXHR) {
        $(boton).html( data.boton );
    });
    }

function DibujaMeGusta( boton, id ) {
    var url = "index.php?controller=botones&action=botonmegusta"; var method = "POST";
    var data = { id: id };
    ajaxHelper(url, method, data).done(function (data, status, jqXHR) {
        $(boton).html( data.boton );
        $(boton).click(function(){ ClicMeGusta( boton, id );
        });
    });
}

function ClicMeGusta( boton, id ) {
    var url = "index.php?controller=botones&action=megusta"; var method = "POST";
    var data = { id: id };
    ajaxHelper(url, method, data).done(function (data, status, jqXHR) {
        $(boton).html( data.boton );
    });
}

function DibujaSeguir( botonid, botonclass, id ) {
    var url = "index.php?controller=botones&action=botonseguir"; var method = "POST";
    var data = { id: id };
    ajaxHelper(url, method, data).done(function (data, status, jqXHR) {
        $(botonid).html( data.boton );
        if (data.boton.indexOf("user-plus") >= 0 )
            $(botonclass).attr( 'title', 'Seguir' ).removeClass( 'btn-danger').addClass( 'btn-success' );
        else
            $(botonclass).attr( 'title', 'No seguir' ).removeClass( 'btn-success').addClass( 'btn-danger' );
            $(botonid).click(function() {
                ClicSeguir( botonid, botonclass, id );
            });
    });
}

function ClicSeguir( botonid, botonclass, id ) {
    var url = "index.php?controller=botones&action=seguir";
    var method = "POST";
    var data = { id: id };
    ajaxHelper(url, method, data).done(function (data, status, jqXHR) {
        if (data.boton.indexOf("user-plus") >= 0 )
            $(botonclass).attr( 'title', 'Seguir' ).removeClass( 'btn-danger').addClass( 'btn-success' );
        else
            $(botonclass).attr( 'title', 'No seguir' ).removeClass( 'btn-success').addClass( 'btn-danger' );
            $(botonclass).html( data.boton );});
}
// Funciones Globales
// Funcion para llamadas Ajax
function ajaxHelper(uri, method, data) { return $.ajax({ 
    type: method, url: uri, dataType: 'json',
    contentType: 'application/json',
    data: data ? JSON.stringify(data) : null, statusCode: {
        401: function (jqXHR, textStatus, errorThrown) {
            alert( errorThrown );}
        }
    });
}

