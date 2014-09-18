<?php  

	//var_dump(leer_ruta());
	//var_dump(ruta_origen());

	/*for ($i=0; $i < count($filas) ; $i++) { 
		var_dump(explode("," , $filas[$i]));
	}*/

	/*$tabla_dinamica = leer_ruta();

	for ($i=0; $i < count($tabla_dinamica); $i++) { 
			for ($j=0; $j <count($tabla_dinamica[$i]) ; $j++) { 
			print_r($tabla_dinamica[$i][$j]);	
			}
		}*/

	function ruta_origen($origen, $destino){
		$tabla = array() ;
		$tabla = leer_ruta();
		$anotar_destino = "";

		while ( $anotar_destino !== $destino) {
			
			for ($i=1; $i < count($tabla); $i++) { 
				for ($j=0; $j < count($tabla[$i]); $j++) { 
					print_r($tabla[$i][$j]);
					print_r($tabla[$i][0]);
				}
				//$tabla = explode(",", $tabla[$origen][$destino]);
			}
		}

		
}


	function leer_ruta($ruta = 'rutas.csv'){
	

	$fichero = file_get_contents($ruta);

	$filas = explode("\n", $fichero);

		$tabla = array();

		for ($i=0; $i < count($filas); $i++) { 
			/*for ($j=0; $j <count($filas[$i]) ; $j++) { 
			print_r($filas[$i][$j]);	
			}*/
		$tabla[] = explode(",", $filas[$i]);
		}
		return $tabla;
	}

	$respuesta = ruta_origen('El Paso', 'Torreón');

	if ($respuesta === '10,10') {
		echo('La prueba 1 pasa');
		} else {
		echo('La prueba 1 no pasa');
	}


?>