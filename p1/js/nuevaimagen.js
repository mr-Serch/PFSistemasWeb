// Variables globales var archivos = [];
var DropzoneFotografia = null;
$(document).ready(function () {
    validate_reglas();
    mapaSede();
    DropzoneFotografia = IniciaDropzone('.fotografia-dropzone', EXTENSIONESIMAGEN, MAXNUMFILES, MAXIMAGESIZE, FOTOGRAFIA);
});

function validate_reglas() {
    $( "form" ).validate({
        rules: {
            titulo: {required: true},
            palabrasclave: { required: true},
            direccion: {required: true},
            latitud: {required: true},
            longitud: {required: true}},
        messages: {
            titulo: {required: "Este campo es obligatorio."},
            palabrasclave: {required: "Este campo es obligatorio."},
            email: {required: "Este campo es obligatorio."},
            latitud: {required: "Este campo es obligatorio."},
            longitud: {required: "Este campo es obligatorio."}},
        errorElement: "em",
        errorPlacement: function ( error, element ) {
        // Agrega la clase `help-block` al elemento error
        error.addClass( "help-block" );
        // Agrega la clase `has-feedback` a la etiqueta div.form-group
        // para agregar los iconos de bootstrap
        element.parents( ".form-group" ).addClass( "has-feedback" );
        if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
        } else {
            error.insertAfter( element );
        }
        // Agrega el elemento span si no existe, y le aplica las clases de icono de bootstrap.
        if ( !element.next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-remove form-control- feedback'></span>" ).insertAfter( element );
        }
    },
    success: function ( label, element ) {
        // Agrega el elemento span si no existe, y le aplica las clases de icono de bootstrap.
        if ( !$( element ).next( "span" )[ 0 ] ) {
            $( "<span class='glyphicon glyphicon-ok form-control- feedback'></span>" ).insertAfter( $( element ) );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        // Agrega los estilos de error
        $( element ).parents( ".form-group" ).addClass( "has-error").removeClass( "has-success" );
        $( element ).next( "span" ).addClass( "glyphicon-remove").removeClass( "glyphicon-ok" );
    },
    unhighlight: function ( element, errorClass, validClass ) {
        // Agrega los estilos de éxito
        $( element ).parents( ".form-group" ).addClass( "has-success").removeClass( "has-error" );
        $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
    }
    });
    valida_forma();
}

function valida_forma() {
    $("form").data("validator").settings.submitHandler = function (form) {
        // Guarda la foto de la sede en caso de existir archivos = []; 
        ValidaArchivo( DropzoneFotografia, '.fotografia-dropzone', archivos, true);
        if (archivos.length > 0 ){
            $('#imagenid').val(archivos[0].ArchivoId);
        }else{
            return false;
        }
        if( confirm( "¿Confirma que desea guardar la información?" ) ) { form.submit();}
    }
}


function mapaSede() {
    $('#mapa').locationpicker({location: { latitude: $("#latitud").val(), longitude: $("#longitud").val()},
    radius: 300, inputBinding: {latitudeInput: $('#latitud'), longitudeInput: $('#longitud'), locationNameInput: $('#direccion')},
    enableAutocomplete: true,
    addressFormat: 'Street address, City, Country'
    });
}

 

