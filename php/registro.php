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
    <h1 style="text-align: center;font-size: 40px; font-weight: 700;">REGISTRO DE USUARIO</h1>
    <form action="registro.php" method="POST">
        <section class="container">
            <label>Dni:</label>
            <input type="text" name="dni" placeholder="Introduce tu dni" required>
            <label>Apodo:</label>
            <input type="text" name="apodo" placeholder="Introduce tu apodo" required>
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Introduce tu nombre" required>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" placeholder="Introduce tus apellidos" required>
            <label>Email:</label>
            <input type="text" name="email" placeholder="Introduce tu email" required>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Introduce tu password" required>
        <section class="botones">
            <input type="submit" name="registrarse" value="Registrar"> 
        </section> 
        </section>
    </form>

    <?php
    if(isset($_POST['registrarse'])){

        //Datos del formulario
        $dni = $_POST['dni'];
        $apodo = $_POST['apodo'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        
/*         echo "<h2>Dni : ".$dni."</h2>";
        echo "<h2>Apodo : ".$apodo."</h2>";
        echo "<h2>Nombre : ".$nombre."</h2>";
        echo "<h2>Apellidos : ".$apellidos."</h2>";
        echo "<h2>Email : ".$email."</h2>";
        echo "<h2>Password : ".$password."</h2>"; */

        if($dni==null || $apodo == null || $nombre==null || $apellidos==null|| $email == null || $password==null) {
            echo "Fallo al insertar los datos";
        }else{
           
            addUser($dni,$apodo,$nombre,$apellidos,$email,$password);
            $id_usr = getIdUsuarioFromUsuario($apodo);
            $id_rol = getIdRolFromUsuario($id_usr);
            if($id_rol==null){
                $id_rol=4;
            }
            addUserRolData($id_usr,$id_rol);
            header("location:index.php");
        }



    }
    ?>



  </body>
</html>

