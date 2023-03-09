<?php
require_once '../php/inicio.php';
//echo $_SESSION['idRol']; 2
?>

<h1>Añadir Trabajo</h1>
<form action="addTrabajoAgricultor.php" method="POST">
    <label for="nombre">Nombre Trabajo</label>
    <input type="text" name="nombre" maxlength="40">
    <br>
    <label for="parcelas">Parcelas:</label>
    <select name="parcelas">
        <?php
        $arrayParcelas = getParcelas();
        foreach ($arrayParcelas as $parcela) {
            echo "<option value='".$parcela['id_parcela']."'>".$parcela['nparcela']."</option>";
        }
        ?>
    </select>
    <br>
    <label for="tarea">Tarea</label>
    <select name="tareas">
        <?php
        $arrayTareas = getTareas();
        foreach ($arrayTareas as $tarea) {
            echo "<option value='".$tarea['id_tarea']."'>".$tarea['nombre_tarea']."</option>";
        }
        ?>
    </select>
    <br>
    <label for="pilotos">Piloto/s Disponibles </label>
    <select name="pilotos">
        <?php
        $arrayPilotos = getPilotoFromIdRol3($_SESSION['idRol']);
        foreach ($arrayPilotos as $piloto) {
            echo "<option value='".$piloto['id_usr']."'>".$piloto['username']."</option>";
        }
        ?>
    </select>
    <br>
    <label for="drones">Drone/s Disponibles </label>
    <select name="drones">
        <?php
        $arrayDrones = getDrones();
        foreach ($arrayDrones as $dron) {
            echo "<option value='".$dron['id_dron']."'>".$dron['nombre_dron']."</option>";
        }
        ?>
    </select>
    <section class="botones">
        <input type="submit" name="addTrabajo" value="Añadir">
        <input type="submit" name="cancelar" value="Cancelar">
    </section>
</form>

<?php
if (isset($_POST['addTrabajo'])) {
    $cont =0;
    if (@$_POST['parcelas'] == null) {
        echo "No existen parcelas";
    } elseif (@$_POST['tareas'] == null) {
        echo "No existen tareas en la bd";
    } elseif(@$_POST['drones']== null){
        echo "No hay drones en la bd";
    }elseif (@$_POST['pilotos'] == null) {
        echo "No existen tareas en la bd";
    } elseif (@$_POST['parcelas'] == null && @$_POST['tareas'] == null) {
        echo "No existen parcelas y tareas en la bd";
    } elseif (@$_POST['parcelas'] == null && @$_POST['tareas'] == null && @$_POST['pilotos'] == null) {
        echo "No existen parcelas,tareas y pilotos en la bd";
    } elseif (@$_POST['parcelas'] == null && @$_POST['tareas'] == null && @$_POST['pilotos'] == null && @$_POST['drones'] == null) {
        echo "No existen parcelas,tareas y pilotos en la bd";
    } elseif (@$_POST['nombre']=="") {
        $nombre = "Sin nombre".$cont;
        echo "Se debe escribir el nombre de trabajo";
    } else {
        addTrabajo($_POST['parcelas'], $_POST['pilotos'], $_POST['tareas'], $_POST['drones'], $_POST['nombre']);
    }
}

    if(isset($_POST['cancelar'])){
        header('location:menu.php');
    }
?>

