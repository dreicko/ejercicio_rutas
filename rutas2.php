<?php

// Codigó utilizado para convertir el formato de texto
header('Content-Type: text/html; charset=UTF-8');

// Función utilizada para leer el archivo csv y obtener los resultados
function obtener_todo($origen, $destino) {

	 
	$a_resultado = array(); // Arreglo para guardar los resultados
	$nombre_archivo = 'rutas.csv'; // Variable utilizada para asignar el archivo csv

	$gestor_archivo = fopen($nombre_archivo, 'r'); // variable igualizada a la funcion fopen para abrir el archivo
	$ciudades = Array(); // Arreglo vacio para guardar los campos del archivo

	$numero_de_renglon = 0; // Variable utilizada para recorrer los renglones
	// Ciclo utilizado para recorrer el archivo
	while (($datos = fgetcsv($gestor_archivo, 1000, ",")) !== FALSE) {
		// Ciclo utilizado para guardar los datos mientras se recorre el archivo
		if ($numero_de_renglon !== 0) {
			$origen_ciudad = utf8_encode($datos[0]); // Asignacion de variables a los indices de un arreglo
			$destino_ciudad = utf8_encode($datos[1]);
			$tiempo = $datos[2];
			$distancia = $datos[3];

			// Asignacion de indices al arreglo $ciudades
			$ciudades[$origen_ciudad] = Array();
			$ciudades[$origen_ciudad]['destino'] = $destino_ciudad;
			$ciudades[$origen_ciudad]['tiempo'] = $tiempo;
			$ciudades[$origen_ciudad]['distancia'] = $distancia;
		}

		// Incremento de la variable para continuar el ciclo while
		$numero_de_renglon += 1;
    
}
	// Declaracion de variables 
    $ciclos_que_llevo = 0; 
    $ya_termine = False;
    $por_donde_voy = $origen;
    $distancia_que_llevo = 0;
    $tiempo_que_llevo = 0;

    // Ciclo utilizado para encontrar la distancia y el tiempo de $origen y $destino
    while ($ya_termine ===False) {
    	if(isset($ciudades[$por_donde_voy]['destino'])){
    		$distancia_que_llevo += $ciudades[$por_donde_voy]['distancia']; // Variable que guarda la distancia
    		$tiempo_que_llevo += $ciudades[$por_donde_voy]['tiempo']; // Variable que guarda el tiempo
    		$por_donde_voy = $ciudades[$por_donde_voy]['destino'];
    	}else {
    		echo("$por_donde_voy no se encontró"); 
    	}
    	echo($por_donde_voy . '' . $destino . "\n");

    	// Ciclo utilizado para terminar el while
    	if($por_donde_voy === $destino || $ciclos_que_llevo > 1000){
    		$ya_termine = True;
    	}
    	$ciclos_que_llevo += 1;
    }

    // Convertir los enteros con decimales
	$valor_entero_distancia = intval($distancia_que_llevo, 0); // Variables igualizadas para obtener la distancia
	$valor_entero_tiempo = round($tiempo_que_llevo, 0);	// Variables igualizadas para obtener el tiempo
	$valor_fraccional_tiempo = $tiempo_que_llevo - $valor_entero_tiempo;
	$minutos = round($valor_fraccional_tiempo * 60, 0);

	// Variables utilizadas para obtener el total de la distancia
	$a_resultado['distancia'] = $valor_entero_distancia;
	// Variables utilizadas para obtener el total del tiempo 
	$a_resultado['tiempo'] = $valor_entero_tiempo . ',' . $minutos;

	// Función utilizada para imprimir el resultado 
	var_dump($a_resultado);
	// Funcion utilizada para regresar el resultado guardado
	return $a_resultado;


}

	// Función utilizada para obtener la distancia 
function obtener_distancia_ruta($origen, $destino) {
	
    $resultado = obtener_todo($origen, $destino);
     return $resultado['distancia'];

}

	// Función utilizada para obtener el tiempo
function obtener_tiempo_ruta($origen, $destino) {
	$resultado = obtener_todo($origen, $destino);
	return($resultado['tiempo']);
}


// Prueba 1
$respuesta = obtener_tiempo_ruta('El Paso', 'Torreón');
	// Prueba para verificar la respuesta de tiempo
if ($respuesta === '10,10') {
	echo('La prueba 1 pasa');
} else {
	echo('La prueba 1 no pasa');
}

// Prueba 2
$respuesta = obtener_distancia_ruta('El Paso', 'Torreón');

	// Prueba para verificar la respuesta de distancia
if ($respuesta === intval('887.6')) {
	echo('La prueba 2 pasa');
} else {
	echo('La prueba 2 no pasa');
}

?>