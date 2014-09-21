<?php  

	function ruta_origen($origen, $destino){
		$tabla = array() ;
		$tabla = leer_ruta();
		$anotar_destino = 0;
		$ciclos = 0;

		while ( $anotar_destino === $destino) {
			
			for ($i=1; $i < count($tabla); $i++) { 
				for ($j=0; $j < count($tabla[$i]); $j++) { 
					print_r($tabla[$i][$j]);
				}
				if($anotar_destino === $destino || ciclos > 100){
					$destino = True;
				}
					$ciclos +1;
				//$tabla = explode(",", $tabla[$origen][$destino]);
			}
		}

		$valor_entero = round($anotar_destino, o);
		$valor_fraccional = $anotar_destino - $valor_entero;

		$minutos = round($valor_fraccional * 60, 0);
		return($valor_entero. ',' . $minutos);
	
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
	$respuesta = ruta_origen('El Paso', 'Torreón');

	// Ciclo que compara la respuesta
	if ($respuesta === '10,10') {
		echo('La prueba 1 pasa');
		} else {
		echo('La prueba 1 no pasa');
	}


?>