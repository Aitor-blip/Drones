<?php
require_once '../php/inicio.php';
//echo $_SESSION['idRol']; 3
?>

<h1>Añadir Dron</h1>
<br>
<form action="addDronPiloto.php" method="POST">

    <label for="nombre">Nombre :</label>
    <input type="text" name="nombre" required>
    <br>
    <label for="marca">Marca :</label>
    <input type="text" name="marca" required>
    <br>
    <section class="botones">
        <input type="submit" name="addDron" value="Añadir">
        <input type="submit" name="cancelar" value="Cancelar">
    </section>
</form>

<?php

    if(isset($_POST['addDron'])){
        if($_POST['nombre'] == ""){
            echo "El nombre del dron tiene que ser mayor a cero caracteres";
        }else if($_POST['marca'] == ""){
            echo "La marca del dron tiene que ser mayor a cero caracteres";
        }else if($_POST['nombre'] != "" && $_POST['marca'] != ""){
            //Añadimos el dron a la bd
            addDron($_POST['nombre'],$_POST['marca']);
        }else{
            echo "El nombre del dron y la marca del dron tienen que ser mayor a cero caracteres";
        }
    }

    if(isset($_POST['cancelar'])){
        header("location:menu.php");
    }



?>

<h2>Eliminar Dron</h2>
<form action="addDronPiloto.php" method="POST">
    <label for="nombre">Nombre del Dron: </label>
    <select name="nombres">
        <?php
        $arrayDrones = getDrones();
        foreach($arrayDrones as $dron){
            echo "<option value='".$dron['id_dron']."'>".$dron['nombre_dron']."</option>";
        }
        ?>
        </select>
        <br>
        <input type="submit" name="eliminarDron" value="Borrar">´
        <input type="submit" name="menu" value="Volver al menu">

</form>

<?php

        if(isset($_POST['eliminarDron'])){
            if(@$_POST['nombres'] == null){
                echo "No hay drones";
            }else{
                removeDron($_POST['nombres']);
                header('location:menu.php');
            }

        }

        if(isset($_POST['menu'])){
            header('location:menu.php');
        }

?>