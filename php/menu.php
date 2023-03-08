<?php
require_once "../php/inicio.php";
echo "<h2> Nombre : ".$_SESSION['nombre'];
echo "<h2> Password : ".$_SESSION['password'];




function mostrarMenuPorIdRol($idRol){

    if ($idRol==1) {
        echo "<form action='menu.php' method='post'>";
        echo "<input type='submit' name='gestionUsuariosAdmin' value='Gestion de Usuarios'>";
        echo "<input type='submit' name='salir' value='Salir'>";
        echo "</form>";
    } elseif ($idRol==2) {
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
    if(isset($_POST['gestionUsuariosAdmin'])){
        header('location:gestionUsuariosAdmin.php');
    }

    //Usuario Agricultor

    if(isset($_POST['gestionUsuariosParcelas'])){
        header("location:gestionUsuariosAgricultor.php");
    }

    if(isset($_POST['añadirTrabajos'])){
        header('location:addTrabajoAgricultor.php');
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