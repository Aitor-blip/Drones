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

function getIdRolFromUsuario($idUsuario) {
    $conexion = conexion();
    $instruccion1 = "select id_rol from usuario_rol where id_usr = $idUsuario";
    $resultado = mysqli_query($conexion, $instruccion1);
    $fila = mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    return @$fila['id_rol'];
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


?>
