<?php
function obtener_todo() {

	$nombre_archivo = 'rutas.csv';

	$gestor_archivo = fopen($nombre_archivo, 'r');
	$ciudades = Array();

	$numero_de_renglon = 0;
	while (($datos = fgetcsv($gestor_archivo, 1000, ",")) !== FALSE) {
		if ($numero_de_renglon !== 0) {
			$origen_ciudad = utf8_encode($datos[0]);
			$destino_ciudad = utf8_encode($datos[1]);
			$tiempo = $datos[2];
			$distancia = $datos[3];

			$ciudades[$origen_ciudad] = Array();
			$ciudades[$origen_ciudad]['destino'] = $destino_ciudad;
			$ciudades[$origen_ciudad]['tiempo'] = $tiempo;
			$ciudades[$origen_ciudad]['distancia'] = $distancia;
		}

		$numero_de_renglon += 1;
    }

    $ciclos_que_llevo = 0;
    $ya_termine = False;
    $por_donde_voy = $origen;
    $distancia_que_llevo = 0;
    while ($ya_termine ===False) {
    	if(isset($ciudades[$por_donde_voy]['destino'])){
    		$distancia_que_llevo += $ciudades[$por_donde_voy]['distancia'];
    		$por_donde_voy = $ciudades[$por_donde_voy]['destino'];
    	}else {
    		echo("$por_donde_voy no se encontró");
    	}
    	echo($por_donde_voy . '' . $destino . "\n");

    	if($por_donde_voy === $destino || $ciclos_que_llevo > 1000){
    		$ya_termine = True;
    	}
    	$ciclos_que_llevo += 1;
    }

    // Convertir los enteros con decimales
	$valor_entero_distancia = intval($distancia_que_llevo, 0);
	//return($valor_entero);

}

function obtener_distancia_ruta($origen, $destino) {
	
    $resultado = obtener_todo();
     return($resultado['distancia']);

}

function obtener_tiempo_ruta($origen, $destino) {
	$resultado = obtener_todo();
	return($resultado['tiempo']);
}

/*
// Prueba 1
$respuesta = obtener_tiempo_ruta('El Paso', 'Torreón');

if ($respuesta === '10,10') {
	echo('La prueba 1 pasa');
} else {
	echo('La prueba 1 no pasa');
}
*/
// Prueba 2
$respuesta = obtener_distancia_ruta('El Paso', 'Torreon');


if ($respuesta === intval('887.6')) {
	echo('La prueba 2 pasa');
} else {
	echo('La prueba 2 no pasa');
}

/*
echo("\n");
echo('18' + '29');
echo(18 + 29);
$suma = 18 + 29;

if ($suma === intval('47')) {
	echo("si es igual");
}
*/
?>