<?php

function conexion() {

    // credenciales del usuario

    $host = "localhost";
    $user = "root";
    $password = "";
    $bd = "agricultura";

    $conexion = mysqli_connect($host, $user, $password, $bd)
            or die("No se puede conectar con el servidor");
    return @$conexion;
}


function getNombreFromUsuario($nombre) {
    $conexion = conexion();
    $instruccion1 = "select username from usuario where username = '$nombre'";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['username'];
}

function getPasswordFromUsuario($password) {
    $conexion = conexion();
    $instruccion1 = "select password from usuario where password = '$password'";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['password'];
}

function getIdUsuarioFromUsuario($nombre) {
    $conexion = conexion();
    $instruccion1 = "select id_usr from usuario where username = '$nombre'";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['id_usr'];
}

function getIdRolFromRoles($idRol) {
    $conexion = conexion();
    $instruccion1 = "select id_rol from roles where id_usr = $idRol";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['id_rol'];
}

function getIdRolFromUsuario($idUsuario) {
    $conexion = conexion();
    $instruccion1 = "select id_rol from usuario_rol where id_usr = $idUsuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['id_rol'];
}

function getDniFromIdUsuario($idUsuario) {
    $conexion = conexion();
    $instruccion1 = "select dni from usuario where id_usr = $idUsuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['dni'];
}

function getApodoFromIdUsuario($idUsuario) {
    $conexion = conexion();
    $instruccion1 = "select username from usuario where id_usr = $idUsuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['username'];
}

function getNombreFromIdUsuario($idUsuario) {
    $conexion = conexion();
    $instruccion1 = "select nombre from usuario where id_usr = $idUsuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['nombre'];
}

function getApellidosFromIdUsuario($idUsuario) {
    $conexion = conexion();
    $instruccion1 = "select apellidos from usuario where id_usr = $idUsuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['apellidos'];
}

function getEmailFromIdUsuario($idUsuario) {
    $conexion = conexion();
    $instruccion1 = "select email from usuario where id_usr = $idUsuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['email'];
}

function getPasswordFromIdUsuario($idUsuario) {
    $conexion = conexion();
    $instruccion1 = "select password from usuario where id_usr = $idUsuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['password'];
}

function getUserNames() {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "select * from usuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}

function removeUsuario($idUsuario) {
    $conexion = conexion();
    $correcto = true;
    //Primero hacemos la insercion de la tabla carrera 

    $instruccion1 = "delete from usuario where id_usr = $idUsuario";
    if (@mysqli_query($conexion, $instruccion1)) {
        
    } else {
        $correcto = false;
    }

    mysqli_close($conexion);
    return $correcto;
}

function removeRolUsuario($idUsuario,$idRol) {
    $conexion = conexion();
    $correcto = true;
    //Primero hacemos la insercion de la tabla carrera 

    $instruccion1 = "delete from usuario_rol where id_usr = $idUsuario and id_rol=$idRol";
    if (@mysqli_query($conexion, $instruccion1)) {
        
    } else {
        $correcto = false;
    }

    mysqli_close($conexion);
    return $correcto;
}

function addUser($dni, $apodo, $nombre,$apellidos,$email,$password) {
    $conexion = conexion();
    $correcto = true;
    //Primero hacemos la insercion de la tabla carrera 
    $instruccion1 = "insert into usuario (dni,username,nombre,apellidos,email,password) values ('$dni','$apodo','$nombre','$apellidos','$email','$password')";
    if (@mysqli_query($conexion, $instruccion1)) {
        
    } else {
        $correcto = false;
    }
    mysqli_close($conexion);
    return $correcto;
}

function addUserRolData($id_usr,$id_rol) {
    $conexion = conexion();
    $correcto = true;
    //Primero hacemos la insercion de la tabla carrera 
    $instruccion1 = "insert into usuario_rol(id_usr,id_rol) values ($id_usr,$id_rol)";
    if (@mysqli_query($conexion, $instruccion1)) {
        
    } else {
        $correcto = false;
    }
    mysqli_close($conexion);
    return $correcto;
}

function getRoles() {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "select * from roles";
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}

function addRol($id_usr, $idRol) {
    $conexion = conexion();
    $correcto = true;
    //Primero hacemos la insercion de la tabla carrera 
    $instruccion1 = "insert into usuario_rol (id_usr,id_rol) values ($id_usr,$idRol)";
    if (@mysqli_query($conexion, $instruccion1)) {
        
    } else {
        echo "<h2>Ya hay una nota</h2>";
        $correcto = false;
    }

    mysqli_close($conexion);
    return $correcto;
}

function getIdrolFromUsuarioNombre($id_usr) {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "select * from usuario_rol where id_usr = $id_usr";
    echo $instruccion1;
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}

function getIdrolesFromIdUsuario($id_usr) {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "select id_rol from usuario_rol where id_usr = $id_usr";
    echo $instruccion1;
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}

function updateDataUsers($apodo, $nombre,$apellidos,$email,$password,$idUsuario) {

    $conexion = conexion();
    $correcto = true;
    $instruccion1 = "update usuario set username ='$apodo',nombre='$nombre',
    apellidos='$apellidos',email='$email',password='$password'
    WHERE id_usr=$idUsuario";
    if (@mysqli_query($conexion, $instruccion1)) {
        
    } else {
        $correcto = false;
    }

    return $correcto;
}

function getRolFromIdUsuario($id_usr) {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "select roles.nombre_rol,roles.id_rol from roles,usuario_rol where 
    roles.id_rol = usuario_rol.id_rol and id_usr = $id_usr";
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}

function getParcelas() {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "select * from parcelas";
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}

function getTareas() {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "select * from tarea";
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}

function getPilotoFromIdRol3($id_rol) {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "SELECT usuario.id_usr,usuario.username
    FROM usuario
    JOIN usuario_rol ON usuario_rol.id_usr = usuario.id_usr
    where usuario_rol.id_rol = $id_rol";
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}


function getDrones() {
    $array = array();
    $conexion = conexion();
    $instruccion1 = "select * from dron";
    $resultado = mysqli_query($conexion, $instruccion1);
    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($array, $fila);
    }
    mysqli_close($conexion);
    return @$array;
}

function removeDron($idDron) {
    $conexion = conexion();
    $correcto = true;
    //Primero hacemos la insercion de la tabla carrera 

    $instruccion1 = "delete from dron where id_dron = $idDron";
    if (@mysqli_query($conexion, $instruccion1)) {
        
    } else {
        $correcto = false;
    }

    mysqli_close($conexion);
    return $correcto;
}

function addDron($nombreDron,$marcaDron) {
    $conexion = conexion();
    $correcto = true;
    //Primero hacemos la insercion de la tabla carrera 
    $instruccion1 = "insert into dron (nombre_dron,marca_dron) values ('$nombreDron','$marcaDron')";
    if (@mysqli_query($conexion, $instruccion1)) {
        
    } else {
        $correcto = false;
    }
    mysqli_close($conexion);
    return $correcto;
}

?>
