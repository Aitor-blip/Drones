<?php
require_once '../php/inicio.php';
?>

<h1>Añadir Parcela</h1>


<form action="gestionUsuariosAgricultor.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="geojson_file"><br><br>
	<input type="submit" name="mostrar" value="Mostrar datos">
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
        $properties = $feature['properties'];
        $coordinates = $geometry['coordinates'];
        //Datos de la parcela
        $provincia = $properties['provincia'];
        $municipio = $properties['municipio'];
        $zona = $properties['zona'];
        $poligono = $properties['poligono'];
        $parcela = $properties['parcela'];
        $recinto = $properties['recinto'];
        
   
        echo "<p>Provincia :".$provincia."<br>";
        echo "<p>Municipio :".$municipio."<br>";
        echo "<p>Zona :".$zona."<br>";
        echo "<p>Poligono :".$poligono."<br>";
        echo "<p>Parcela :".$parcela."<br>";
        echo "<p>Recinto : ".$recinto."<br>";

        $_SESSION['n_parcela'] = $parcela;
        $_SESSION['municipio'] = $municipio;
        $_SESSION['provincia'] = $provincia;
        $_SESSION['n_poligono'] = $poligono;

        

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

    $_SESSION['longitudes'] = $longitudes;
    $_SESSION['latitudes'] = $latitudes;

    echo "<form action='gestionUsuariosAgricultor.php' method='POST'>";
    echo "<select name='coordenadas'>";
    global $long,$lat;
    for($i=0;$i<count($_SESSION['longitudes']);$i++){
        $long =0;
        $lat =0;
        foreach($_SESSION['longitudes'] as $longitud){
            $long = $longitud;
        }

        foreach($_SESSION['latitudes'] as $latitud){
            $lat = $latitud;
        }

        echo "<option value='".$i."'>".$long.",".$lat."</option>";
    }
    echo "</select>";
    echo "<br><br>";
    echo "<p>Id Parcela :<select name='idsP'></p>";
    $array = getAllIdParcelaFromParcelas();
    foreach ($array as $id) {
        echo "<option value='".$id['id_parcela']."'>".$id['id_parcela']."</option>";
    }
    
    echo "</select>";
    echo "<input style='margin:20px;' type='submit' name='mapa' value='Mostrar Mapa'>";
    echo "<input style='margin:20px;' type='submit' name='addParcela' value='Añadir Parcela'>";
    echo "<input style='margin:20px;' type='submit' name='menu' value='Volver al menu'>";
    echo "</form>";
}

if(isset($_POST['addParcela'])){
    
    $parcela = $_SESSION['n_parcela'];
    $municipio = $_SESSION['municipio'];
    $provincia = $_SESSION['provincia'];
    $poligono = $_SESSION['n_poligono'];
    $id_usr = $_SESSION['idUsuario'];
    $longitudCoordenada = $_SESSION['longitudes'][0];
    $latitudCoordenada = $_SESSION['latitudes'][1];
    //Añadimos el idParcela en las Parcelas
    insertarParcela($parcela,$municipio,$provincia,$poligono,$id_usr);

    try {
        $idParcela = getIdParcelaFromParcela($_POST['idsP']);
        insertarCoodenadasTablaContenedorParcela($idParcela, $longitudCoordenada, $latitudCoordenada);
    }catch( mysqli_sql_exception $e){
        echo "No se puede repetir el id de la parcela";
    }


}

    if(isset($_POST['menu'])){
        header('location:menu.php');
    }

    if(isset($_POST['mapa'])){
        header('location:mapa.html');
    }



    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>


   

    