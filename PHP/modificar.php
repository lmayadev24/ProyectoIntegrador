<?php
    require "conexion.php";

    $con = conectar();
    $user=$_GET['user'];
    $nivel = $_GET['nivel'];

    if($nivel === 'Administrador'){
        header("Location: ../html/dashboard.php");
        exit;
    } else{
        $modificar = "UPDATE usuarios SET nivel = '".$nivel ."' WHERE Usuario = '".$user ."'";
        $con->query($modificar);
        $con->close();

        header("Location: ../html/dashboard.php");
        exit;
    }
?>