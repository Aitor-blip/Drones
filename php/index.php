<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Drones</title>
    <link rel="stylesheet" href="./css/Estilos.css">
</head>
<body>
    <h1 style="text-align: center;font-size: 40px; font-weight: 700;">LOGIN DE USUARIO</h1>
    <form action="index.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" placeholder="Introduce tu nombre">
        <label>Password:</label>
        <input type="password" name="password" placeholder="Introduce tu password">
        <section class="botones">
           <input type="submit" name="login" value="Login"> 
           <input type="submit" name="registrarse" value="Registrar"> 
        </section>
    </form>
    <?php

        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        echo "Nombre : ".$nombre;
        echo "Password : ".$password;

        
    ?>
    
</body>
</html>