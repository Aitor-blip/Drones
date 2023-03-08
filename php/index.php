<?php
session_start();
require_once '../php/bd/metodosBd.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Drones</title>
    <link rel="stylesheet" href="../css/Estilos.css">
</head>
<body>
    <h1 style="text-align: center;font-size: 40px; font-weight: 700;">LOGIN DE USUARIO</h1>
    <form action="index.php" method="POST">
        <section class="container">
           <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Introduce tu nombre" required>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Introduce tu password" required>
            <section class="botones">
                <input type="submit" name="login" value="Login"> 
                <input type="submit" name="registrarse" value="Registrar"> 
        </section> 
        </section>
        
    </form>
    <?php

    if(isset($_POST['login'])){
        

        $nombre = $_POST['nombre'];
        $password = $_POST['password'];


        $nombreBD = getNombreFromUsuario($nombre);
        $passwordBd = getPasswordFromUsuario($password);

     

       
        if($nombreBD==null || $passwordBd==null){
            echo "No existe el apodo del usuario en la base de datos<br>";
        }


        if($nombre == $nombreBD && $password == $passwordBd){
            
            $id_usr = getIdUsuarioFromUsuario($nombreBD);
            $id_rol = getIdRolFromUsuario($id_usr);
           
            $_SESSION['nombre'] = $nombreBD;
            $_SESSION['idUsuario'] = $id_usr;
            $_SESSION['password'] = $passwordBd;
            

            if($id_rol==null){
                $id_rol=4;
            }

            $_SESSION['idRol'] = $id_rol;

            header("location:menu.php"); 
        }

       
    }

    if(isset($_POST['registrarse'])){
        header("location:registro.php"); 
    }

    // Returns the key at the end of the array
    function endKey( $array ){

    //Aquí utilizamos end() para poner el puntero
    //en el último elemento, no para devolver su valor
    end( $array );

    return key( $array );

}

    ?>
    
</body>
</html>