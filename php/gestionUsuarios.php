<?php
session_start();
require_once '../php/bd/metodosBd.php';
?>

<style>
    h1{
        margin: 20px;
    }
</style>


<h1>Borrar Usuario</h1>
<?php


echo "<form action='gestionUsuarios.php' method='post'>";
echo "<p>Usuario :<select name='usuarios'></p>";
$arrayUsuarios = getUserNames();
foreach ($arrayUsuarios as $usuario) {
    echo "<option value='".$usuario['id_usr']."'>".$usuario['nombre']."</option>";
}
echo "</select>";
echo "<section class='usersBotones'>";
echo "<input type='submit' name='borrar' value='Borrar'>";
echo "<input type='submit' name='cancelar' value='cancelar'>";
echo "</section>";
echo "</form>";

if(isset($_POST['borrar'])){
    removeUsuario($_POST['usuarios']);
    echo "Usuario con id ".$_POST['usuarios']."borrado";
}

if(isset($_POST['cancelar'])){

    header("location:menu.php");
}
?>

<br><br>
<?php
echo "<form action='gestionUsuarios.php' method='post'>";
echo "<p>Asignar Roles a Usuario :<select name='users'></p>";
$arrayUsuarios = getUserNames();
foreach ($arrayUsuarios as $usuario) {
    echo "<option value='".$usuario['id_usr']."'>".$usuario['nombre']."</option>";
}
echo "</select> <p>Rol Propuesto</p><select name='roles'>";
$arrayRoles = getRoles();
foreach ($arrayRoles as $rol) {
    echo "<option value='".$rol['id_rol']."'>".$rol['nombre_rol']."</option>";
}

echo "</select><br><br>";
echo "<section class='usersBotones'>";
echo "<input type='submit' name='asignarRol' value='Asignar Rol'><input type='submit' name='cancelar2' value='Cancelar'>";
echo "</section>";
echo "</form>";

if(isset($_POST['asignarRol'])){
    addRol($_POST['users'],$_POST['roles']);
    echo "Rol ".$_POST['roles']." añadido al usuario ".$_SESSION['nombre'];
}

if(isset($_POST['cancelar2'])){
    header('location:menu.php');
}


echo "<form action='gestionUsuarios.php' method='post'>";
echo "<h3>Eliminar Roles a Usuario</h3><br><p>Nombre del Usuario:<select name='usersEliminar'></p>";
$arrayUsuariosEliminar = getUserNames();
foreach ($arrayUsuariosEliminar as $usuario) {
    echo "<option value='".$usuario['id_usr']."'>".$usuario['nombre']."</option>";
}
echo "</select> <p>Rol que se quiere Eliminar</p><select name='roles'>";
$arrayRolesUsuario = getRoles();
foreach ($arrayRolesUsuario as $usuario) {
    echo "<option value='".$usuario['id_rol']."'>".$usuario['nombre_rol']."</option>";
}
echo "</select>";
echo "<section class='usersBotones'>";
echo "<input type='submit' name='eliminarRol' value='Eliminar Rol'>";
echo "<input type='submit' name='cancelar3' value='Cancelar'>";
echo "</section>";
echo "<input type='submit' name='salir' value='Salir'>";
echo "</form>";

if(isset($_POST['eliminarRol'])){
    removeRolUsuario($_POST['usersEliminar'],$_POST['roles']);
    /* echo "Id del usuario : ".$_POST['usersEliminar']."<br>";
    echo "Id del rol : ".$_POST['roles']; */

}

if(isset($_POST['cancelar3'])){
    header("location:menu.php");
}

if(isset($_POST['salir'])){
    header("location:index.php");
}


?>

