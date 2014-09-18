<?php 

$fila = 1;
if (($gestor = fopen("rutas.csv", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        $numero = count($datos);
        //echo "<p> $numero de campos en la linea $fila: <br /></p>\n";
        $fila++;
        var_dump($datos);
       /* for ($c=0; $c < $numero; $c++) {
            echo $datos[$c] . "<br />\n";
        }*/
    }
    fclose($gestor);
}
 ?>