<?php
require_once '../php/inicio.php';
//echo $_SESSION['idRol']; 3
?>
<h1>Ver Trabajos</h1>

<table>
    <thead>
        <tr>
            <th>Id Trabajo</th>
            <th>Id Dron</th>
            <th>Id Parcela</th>
            <th>Id Piloto</th>
            <th>Id Tarea</th>
            <th>Nombre Trabajo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form action="verTrabajos.php" method="POST">
                <input type="submit" name="ejecutar" value="Ejecutar Trabajo">
            </form>
            <?php
            $arrayTrabajos = getTrabajos();

            foreach($arrayTrabajos as $trabajo){
                echo "<td>".$trabajo['id_trabajo']."</td>";
                echo "<td>".$trabajo['id_dron']."</td>";
                echo "<td>".$trabajo['id_parcela']."</td>";
                echo "<td>".$trabajo['id_piloto']."</td>";
                echo "<td>".$trabajo['id_tarea']."</td>";
                echo "<td>".$trabajo['nombre_Trabajo']."</td>";
                $_SESSION['idTrabajo'] = $trabajo['id_trabajo'];
              }

              if(isset($_POST['ejecutar'])){
                 if(@$_SESSION['idTrabajo'] == null || $arrayTrabajos == null){
                    echo "<br>No hay trabajos";          
                }else{
                    $eliminada = removeTrabajo($_SESSION['idTrabajo']);
                    if($eliminada){
                        echo "Tarea Ejecutada";
                    }else{
                        echo "Tarea no ejecutada";
                    }  
              }
              }

             
            ?>
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