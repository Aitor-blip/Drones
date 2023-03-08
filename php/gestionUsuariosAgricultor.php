<?php
require_once '../php/inicio.php';
?>

<h1>Añadir Parcela</h1>


<form action="gestionUsuariosAgricultor.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="geojson_file"><br><br>
	<input type="submit" name="mostrar" value="Mostrar datos">
</form>

	<?php
	if(isset($_POST['mostrar'])){
		$file = $_FILES['geojson_file']['tmp_name'];
		$data = file_get_contents($file);
		$geojson = json_decode($data, true);

/* 		// Mostrar datos del archivo GeoJSON
		echo "<pre>";
		print_r($geojson);
		echo "</pre>"; */

        /*
        foreach ($obj->features as $feature) {
  $nombre = $feature->properties->nombre;
  $area = $feature->properties->area; 
         */

        // Acceder a las coordenadas de cada punto
        foreach ($geojson['features'] as $feature) {
            
            $coordinates = $feature['geometry']['coordinates'];

            
            print_r($coordinates);
        }	
    }
    

    function getCoordenada($array,$latitud,$longitud){
        return $array[$latitud][$longitud];
    }

    ?>