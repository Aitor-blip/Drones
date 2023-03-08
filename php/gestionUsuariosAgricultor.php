<?php
require_once '../php/inicio.php';
global $longitudes,$latitudes,$cont;
$cont=0;

?>

<h1>Añadir Parcela</h1>


<form action="gestionUsuariosAgricultor.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="geojson_file"><br><br>
	<input type="submit" name="mostrar" value="Mostrar datos">
    <input type="submit" name="next" value="Siguiente">
</form>

	<?php
    
if (isset($_POST['mostrar'])) {
    $data = file_get_contents("Recinto.geojson");
    // Luego, se decodifica el JSON para obtener un objeto PHP
    $datos = json_decode($data, true);
    // Inicializar arrays de longitud y latitud
    $longitudes = array();
    $latitudes = array();

    foreach ($datos['features'] as $feature) {
        $geometry = $feature['geometry'];
        $type = $geometry['type'];
        $coordinates = $geometry['coordinates'];

        if ($type == 'Point') {
            $longitudes[] = $coordinates[0];
            $latitudes[] = $coordinates[1];
        } elseif ($type == 'LineString' || $type == 'MultiPoint') {
            foreach ($coordinates as $coord) {
                $longitudes[] = $coord[0];
                $latitudes[] = $coord[1];
            }
        } elseif ($type == 'Polygon' || $type == 'MultiLineString') {
            foreach ($coordinates as $line) {
                foreach ($line as $coord) {
                    $longitudes[] = $coord[0];
                    $latitudes[] = $coord[1];
                }
            }
        } elseif ($type == 'MultiPolygon') {
            foreach ($coordinates as $polygon) {
                foreach ($polygon as $line) {
                    foreach ($line as $coord) {
                        $longitudes[] = $coord[0];
                        $latitudes[] = $coord[1];
                    }
                }
            }
        }
    }
}

if(isset($_POST['next'])){
    
}

echo $cont;

    ?>