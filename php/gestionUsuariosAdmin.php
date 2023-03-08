<?php
require_once '../php/inicio.php';
?>
<style>
    h1{
        margin: 20px;
    }
</style>


    <h1>Borrar Usuario</h1>
    <form action='gestionUsuariosAdmin.php' method='post'>
        <p>Usuario :<select name='usuarios'></p>;
    <?php
    $arrayUsuarios = getUserNames();
    foreach ($arrayUsuarios as $usuario) {
        echo "<option value='".$usuario['id_usr']."'>".$usuario['nombre']."</option>";
    }
    ?>
    </select>
    <section class='usersBotones'>
        <input type='submit' name='borrar' value='Borrar'>
        <input type='submit' name='cancelar' value='Cancelar'>
        <input type='submit' name='buscar' value='Buscar Datos'>
    </section>

<?php

if(isset($_POST['borrar'])){
    removeUsuario($_POST['usuarios']);
    echo "Usuario con id ".$_POST['usuarios']."borrado";
}

if(isset($_POST['cancelar'])){

    header("location:menu.php");
}

?>

    <form action='gestionUsuariosAdmin.php' method='post'>
        <h2>Asignar Roles a Usuario :<select name='users'></h2>
        <?php
        $arrayUsuarios = getUserNames();
        foreach ($arrayUsuarios as $usuario) {
            echo "<option value='".$usuario['id_usr']."'>".$usuario['nombre']."</option>";
        }
        ?>
        </select> <p><em>Rol Propuesto</p></em><select name='roles'>
        <?php
        $arrayRoles = getRoles();
        foreach ($arrayRoles as $rol) {
            echo "<option value='".$rol['id_rol']."'>".$rol['nombre_rol']."</option>";
        }
        ?>

    </select><br><br>
    <section class='usersBotones'>
    <input type='submit' name='asignarRol' value='Asignar Rol'><input type='submit' name='cancelar2' value='Cancelar'>
    </section>

    <?php


if(isset($_POST['buscar'])){
    echo "<form action='gestionUsuariosAdmin.php' method='post'>";
    echo "<h3>Eliminar Roles a Usuario</h3><br><p>Nombre del Usuario:<select name='usersEliminar'></p>";
    $arrayUsuariosEliminar = getUserNames();
    foreach ($arrayUsuariosEliminar as $usuario) {
        echo "<option value='".$usuario['id_usr']."'>".$usuario['nombre']."</option>";
    }
    echo "</select> <p>Rol que se quiere Eliminar</p><select name='roles'>";
    $arrayRolesUsuario = getRolFromIdUsuario($_POST['users']);
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
}

if(isset($_POST['asignarRol'])){
    echo $_POST['users'];
    echo $_POST['roles'];
    addRol($_POST['users'],$_POST['roles']);
}

if(isset($_POST['cancelar2'])){
    header('location:menu.php');
}




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

