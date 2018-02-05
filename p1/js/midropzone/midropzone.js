Dropzone.autoDiscover = false;

    function IniciaDropzone(selector, acceptedFiles, maxFiles, maxFileSize, tipo) {
        $('.text-dimensiones').text('El tamaño máximo de archivo es de ' + maxFileSize + ' MB.');
        if ($(selector).length > 0) {
            var drop = new Dropzone(selector, {
                url: "index.php?controller=upload&action=nuevo&id=" 
                + tipo, maxFilesize: maxFileSize, // MB
                maxFiles: maxFiles, addRemoveLinks: true, createImageThumbnails: true,
                acceptedFiles: acceptedFiles,
                dictInvalidFileType: "Tipo de archivo incorrecto. Verifique por favor.",
                dictFileTooBig: "El archivo sobrepasa el tamaño máximo.",dictRemoveFile: "Quitar archivo",
                dictMaxFilesExceeded: "Ha llegado a la cantidad máxima de archivos permitidos.",});
        
            drop.on('error', function (file, errorMessage) {
                var mensaje = "No se puede agregar el archivo en este momento.Inténtelo nuevamente.";
                if (errorMessage.Message != null) mensaje = errorMessage.Message;
                else if (errorMessage != null) mensaje = errorMessage;});
            //drop.removeFile(file); errordropzone(selector, mensaje);
            drop.on('complete', function (file) {
                file.previewElement.classList.add('dz-complete');});
            drop.on("success", function (file, response) {
                $(file.previewTemplate).append('<div class="server_file">' + response.ArchivoId + '</div>');
                //alert(response.ArchivoId);
                $("#imagenid").val(response.ArchivoId);
                quitaerrordropzone(selector);});

            drop.on("removedfile", function (file) {
                var server_file = $(file.previewTemplate).children('.server_file').text();
                if (server_file != '') {
                    var url = "index.php?controller=upload&action=elimina"; var method = "POST";
                    var data = { id: server_file };
                    ajaxHelper(url, method, data).done();}
                });
            return drop;
        }
    }

    function errordropzone(selector, mensaje) {
        quitaerrordropzone(selector, mensaje);
        $(selector).after('<small class="help-block" data-fv-for="txtTitulo" data-fv- result="INVALID">' + mensaje + '</small>').closest('.form-group').addClass('has- feedback has-error');
    }
 
    function quitaerrordropzone(selector) {
        $(selector).closest('.form-group').removeClass('has-feedback has- error').find('.help-block').remove();
    }

    function ValidaArchivo(dropzona, classdropzone, archivos,	valida) {
        var files = dropzona.files;
        if (files.length > 0) {
            for (var i = 0; i < files.length; i++) { archivos.push({
                ArchivoId: $(files[i].previewTemplate).find('.server_file').text()});
            }
            return true;
        } else if(valida) {
            $('.bs-callout').fadeIn();
            errordropzone(classdropzone, "El archivo es requerido.");
            $(classdropzone).focus(); return false;
        }
        return true;
    }

    function DibujaArchivos(misarchivos, dropzona, tipo) {
        var existingFileCount = 0;
        $.each(misarchivos, function (i, archivo) {
            if (archivo.Tipo == tipo) {
                var mockFile = {name: archivo.Nombre, size: archivo.Size, type: archivo.Mime, accepted: true, status: Dropzone.ADDED,url: "files/index/" + archivo.ArchivoId};
                dropzona.emit("addedfile", mockFile); dropzona.files.push(mockFile);
                if (tipo != PDF) {
                    dropzona.emit("thumbnail", mockFile,"index.php?controller=archivo&action=getById&id=" + archivo.ArchivoId);
                }
                dropzona.emit("success", mockFile, archivo.ArchivoId); file = dropzona.files[existingFileCount];
                file.previewElement.classList.add('dz-complete');
                $(file.previewTemplate).find('.server_file').text(archivo.ArchivoId);
                existingFileCount++;

            }
        });
    }    
