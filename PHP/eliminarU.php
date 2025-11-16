<?php
    require "conexion.php";

    $con = conectar();
    $valor=$_GET['user'];

    echo "El usuario es: ".$valor;
    $elimina = "delete from usuarios where Usuario = '".$valor ."'";
    $con->query($elimina);
    $con->close();

    header("Location: ../html/dashboard.php");
?>