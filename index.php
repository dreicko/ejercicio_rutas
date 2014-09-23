<?php  

	function ruta_tiempo($origen, $destino){

		$tabla = array() ;
		$tabla = leer_ruta();
		$fin_ruta = false;
		$inicio = 0;
		$anotar_destino = 0;
		$tiempo = 0;
		$ciclos = 0;
		$tmp_origen=$origen;

		while ( $fin_ruta !== true ) {

			for ($i=1; $i < count($tabla); $i++) { 
					$inicio = $tabla[$i][0];
					if ($inicio === $tmp_origen && $tabla[$i][1] !== $destino){
						$tmp_origen = $tabla[$i][1];
						$anotar_destino = $tabla[$i][1];
						// sumando el tiempo
						$tiempo = $tabla[$i][2] + $tiempo;
					}
			}
				if($anotar_destino === $destino || $ciclos > 100){
					$fin_ruta = true;
				}
					$ciclos ++;
		}
			 	
		$valor_entero = $tiempo;
		return $valor_entero;
	
}

	function ruta_distancia($origen, $destino){
	
		$tabla = array() ;
		$tabla = leer_ruta();
		$fin_ruta = false;
		$inicio = 0;
		$anotar_destino = 0;
		$distancia = 0;
		$ciclos = 0;
		$tmp_origen=$origen;

		while ( $fin_ruta !== true ) {

			for ($i=1; $i < count($tabla); $i++) { 
					$inicio = $tabla[$i][0];
					if ($inicio === $tmp_origen && $tabla[$i][1] !== $destino){
						$tmp_origen = $tabla[$i][1];
						$anotar_destino = $tabla[$i][1];

						// sumando el distancia
						$distancia = $tabla[$i][3] + $distancia;
					}
			}
				if($anotar_destino === $destino || $ciclos > 100){
					$fin_ruta = true;
				}
					$ciclos ++;
		}
			 	
		$valor_entero = $distancia;
		return($valor_entero);
		var_dump($valor_entero);

	}

    // Función de tabla dinamica que lee el archivo csv
	function leer_ruta($ruta = 'rutas.csv'){
	
	// Variable que lee el archivo
	$fichero = file_get_contents($ruta);

	// Explota el archivo y lo convierte en un array
	$filas = explode("\n", $fichero);

		// Variable asignada a un array
		$tabla = array();

		// Ciclo para leer las filas 
		for ($i=0; $i < count($filas); $i++) { 
			/*for ($j=0; $j <count($filas[$i]) ; $j++) { 
			print_r($filas[$i][$j]);	
			}*/
		$tabla[] = explode(",", $filas[$i]);
		}
		return $tabla;
	}

	// Variable utilizada para prueba
	$respuesta = ruta_tiempo('El Paso', 'Torreon');

	// Ciclo que compara la respuesta
	if ($respuesta === 10.16) {
		echo('La prueba 1 pasa');
		var_dump($respuesta);
		} else {
		echo('La prueba 1 no pasa');
	}

	$respuesta = ruta_distancia('El Paso', 'Torreon');
	// Ciclo que compara la distancia
	if ($respuesta === 887.58) {
		echo "La prueba 2 pasa";
		var_dump($respuesta);
	}else{
		echo "La prueba 2 no pasa";
	}



?>
