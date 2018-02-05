
    $( "form" ).validate({ rules: {
        buscar: {
            required: true
        }
    },
    messages: {
        buscar: {
            required: "Este campo es obligatorio."
        }
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
        // Agrega la clase `help-block` al elemento error error.addClass( "help-block" );
        // Agrega la clase `has-feedback` a la etiqueta div.form-group
        // para agregar los iconos de bootstrap
        element.parents( ".input-group" ).addClass( "has-feedback" ); error.insertAfter( element.parents( ".input-group" ) );
        },
    highlight: function ( element, errorClass, validClass ) {
        // Agrega los estilos de error
        $( element ).parents( ".input-group" ).addClass( "has-error").removeClass( "has-success" );
    },
    unhighlight: function ( element, errorClass, validClass ) {
        // Agrega los estilos de éxito
        $( element ).parents( ".input-group" ).addClass( "has-success").removeClass( "has-error" );
    }
     
    });
    