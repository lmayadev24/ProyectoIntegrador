<?php
ob_start();
session_start();

include 'conexion.php';
$con = conectar();

$User = htmlspecialchars($_POST['usuario']??'');
$Password = htmlspecialchars($_POST['contrasena']??'');

login($con, $User, $Password);

function login($con, $User, $Password){
    try{
        $consulta = "SELECT * 
        FROM usuarios
        WHERE Usuario = '".$User."' and Contrasena = '".$Password."'";

        $resultado = $con -> query($consulta);

        if ($resultado && $resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            $_SESSION['nivel'] = $usuario['nivel']; //Mantemos el nivel de usuario

            if ($_SESSION['nivel'] == 'admin') {
                header("Location: ../HTML/admin.php");
            } else {
                header("Location: ../HTML/index.php");
            }
            exit;

        } else { 
            header("Location: ../HTML/index.php?error=1");
            exit;
        }

    }catch(Exception $e){
        echo "El error es: ".$e->getMessage();
    }
}
ob_end_flush();
?>