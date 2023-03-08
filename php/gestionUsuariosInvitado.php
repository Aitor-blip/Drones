<?php
session_start();
require_once '../php/bd/metodosBd.php';
?>

<h1>Modificar Datos Usuario</h1>
<?php

    global $idUsuario,$dni,$apodo,$nombre,$apellidos,$email,$password;
    $idUsuario =$_SESSION['idUsuario'];
    $dni = getDniFromIdUsuario($idUsuario);
    $apodo = getApodoFromIdUsuario($idUsuario);
    $nombre = getNombreFromIdUsuario($idUsuario);
    $apellidos = getApellidosFromIdUsuario($idUsuario);
    $email = getEmailFromIdUsuario($idUsuario);
    $password = getPasswordFromIdUsuario($idUsuario);

?>
<br>
<form action="gestionUsuariosInvitado.php" method="POST">
    <label for="dni">Dni</label>
    <input type="text" name="dni" value="<?php echo $dni;?>" readonly>
    <br>
    <label for="apodo">Apodo</label>
    <input type="text" name="apodo" value="<?php echo $apodo;?>">
    <br>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?php echo $nombre;?>">
    <br>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" value="<?php echo $apellidos;?>">
    <br>
    <label for="email">Email</label>
    <input type="text" name="email" value="<?php echo $email;?>">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" value="<?php echo $password;?>">
    <br>
    <section class="botones">
        <input type="submit" name="registrar" value="Registrar">
        <input type="submit" name="menu" value="Volver Al Menu">
    </section>
</form>

<?php

    if(isset($_POST['registrar'])){
        $apodoForm = $_POST['apodo'];
        $nombreForm = $_POST['nombre'];
        $apellidosForm = $_POST['apellidos'];
        $emailForm = $_POST['email'];
        $passwordForm = $_POST['password'];

/*         echo "Dni del formulario : ".$dniForm;
        echo "Apodo del formulario : ".$apodoForm;
        echo "Nombre del formulario : ".$nombreForm;
        echo "Apellidos del formulario : ".$apellidosForm;
        echo "Email del formulario : ".$emailForm;
        echo "Password del formulario : ".$passwordForm; */


        updateDataUsers($apodoForm,$nombreForm,$apellidosForm,$emailForm,$passwordForm,$idUsuario);

        echo "Usuario ".$apodoForm." modificado";

        $_SESSION['nombre'] = $apodoForm;

    }

    if(isset($_POST['menu'])){
        header("location:menu.php");
    }

?>