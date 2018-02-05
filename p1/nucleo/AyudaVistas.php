<?php
class AyudaVistas{
    public function url( $controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO){
        $urlString = "index.php?controller={$controlador}&action={$accion}"; return $urlString;
    }

    public function imagen_url( $nombre ){
        $urlString = UPLOADS_DIR . '/' . $nombre; return $urlString;
    }
    public function print_row( &$item ) { echo('<tr>');
        echo('<td>'); echo(implode('</td><td>', $item)); echo('</td>');
        echo('</tr>');
    }
}
?>


