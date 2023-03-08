<?php
require_once "../php/inicio.php";
/* echo "<h2> Nombre : ".$_SESSION['nombre'];
echo "<h2> Password : ".$_SESSION['password']."<br>"; */


function mostrarMenuPorIdRol($idRol){

    if ($idRol==1) {
        echo "<form action='menu.php' method='post'>";
        echo "<input type='submit' name='gestionDronesAdmin' value='Gestion de Drones'>";
        echo "<input type='submit' name='verTrabajos' value='Ver Trabajos'>";
        echo "<input type='submit' name='gestionRoles' value='Gestion de Roles de Usuarios'>";
        echo "<input type='submit' name='gestionParcelas' value='Gestion de Parcelas'>";
        echo "<input type='submit' name='addTrabajos' value='Añadir Trabajos'>";
        echo "<input type='submit' name='gestionUsuariosAdmin' value='Gestion de Usuarios'>";
        echo "<input type='submit' name='salir' value='Salir'>";
        echo "</form>";
    } else if ($idRol==2) {
        echo "<form action='menu.php' method='post'>";
        echo "<input type='submit' name='gestionUsuariosParcelas' value='Gestion de Parcelas'>";
        echo "<input type='submit' name='añadirTrabajos' value='Añadir Trabajos'>";
        echo "<input type='submit' name='salir' value='Salir'>";
        echo "</form>";
    }else if($idRol==3){
        echo "<form action='menu.php' method='post'>";
        echo "<input type='submit' name='gestionDrones' value='Gestion de Drones'>";
        echo "<input type='submit' name='verTrabajos' value='Ver Trabajos'>";
        echo "<input type='submit' name='salir' value='Salir'>";
        echo "</form>";

    }else  if ($idRol == 4) {
        echo "<form action='menu.php' method='post'>";
        echo "<input type='submit' name='gestionUsuarios' value='Gestion de Usuarios'>";
        echo "<input type='submit' name='salir' value='Salir'>";
        echo "</form>";
    }


    //Usuario Administrador

    if(isset($_POST['gestionDronesAdmin'])){
        header('location:addDronPiloto.php');
    }

    if(isset($_POST['verTrabajos'])){
        header('location:verTrabajos.php');
    }

    if(isset($_POST['gestionRoles'])){
        header('location:gestionUsuariosAdmin.php');
    }

    if(isset($_POST['gestionParcelas'])){
        header('location:gestionUsuariosAgricultor.php');
    }


    if(isset($_POST['gestionUsuariosAdmin'])){
        header('location:gestionUsuariosInvitado.php');
    }

    if(isset($_POST['addTrabajos'])){
        header('location:addTrabajoAgricultor.php');
    }

    if(isset($_POST['gestionUsuariosAdmin'])){
        header('location:gestionUsuariosInvitado.php');
    }

    if(isset($_POST['salir'])){
        header('location:index.php');
    }

    //Usuario Agricultor

    if(isset($_POST['gestionUsuariosParcelas'])){
        header("location:gestionUsuariosAgricultor.php");
    }

    if(isset($_POST['añadirTrabajos'])){
        header('location:addTrabajoAgricultor.php');
    }

    //Usuario Piloto

    if(isset($_POST['gestionDrones'])){
        header('location:addDronPiloto.php');
    }

    if(isset($_POST['verTrabajos'])){
        header('location:verTrabajos.php');
    }

    //Usuario Invitado
    if(isset($_POST['gestionUsuarios'])){
        header("location: gestionUsuariosInvitado.php");
    }

    if(isset($_POST['salir'])){
        header("location: index.php");
    }
    
}
mostrarMenuPorIdRol($_SESSION['idRol']);




?>

<style>
    input{
        padding: 10px;
        margin: 20px;
    }
</style>