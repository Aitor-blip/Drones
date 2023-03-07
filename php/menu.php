<?php
session_start();
echo "<h2> Nombre : ".$_SESSION['nombre'];
echo "<h2> Password : ".$_SESSION['password'];
echo "<h2> Id Usuario : ".$_SESSION['idUsuario'];
echo "<h2> Id Rol : ".$_SESSION['idRol'];
$idRol = $_SESSION['idRol'];

function mostrarMenuPorIdRol($idRol){

    if($idRol == 4){
        echo "<form action='menu.php' method='post'>";
        echo "<input type='submit' name='gestionUsuarios' value='Gestion de Usuarios'>";
        echo "<input type='submit' name='salir' value='Salir'>";
        echo "</form>";
    }

    if(isset($_POST['gestionUsuarios'])){
        header("location: gestionUsuarios.php");
    }

    if(isset($_POST['salir'])){
        header("location: index.php");
    }

}

mostrarMenuPorIdRol($idRol);



?>

<style>
    input{
        padding: 10px;
        margin: 20px;
    }
</style>