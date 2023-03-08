<?php
require_once '../php/inicio.php';
//echo $_SESSION['idRol']; 3
?>
<h1>Ver Trabajos</h1>
<?php
    global $nombreTrabajo,$estado;
    $estado =false;
?>

<table>
    <thead>
        <tr>
            <th>Nombre Trabajo</th>
            <th>Id Dron</th>
            <th>Id Parcela</th>
            <th>Fecha de Realizacion</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<form action="verTrabajos.php" method="POST">
    <input type="submit" name="menu" value="Volver al menu">
</form>

<?php

    if(isset($_POST['menu'])){
        header('location:menu.php');
    }
?>