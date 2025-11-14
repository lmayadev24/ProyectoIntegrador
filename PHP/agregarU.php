<?php
include 'conexion.php';
$con = conectar();

$nom       = htmlspecialchars($_POST['name'] ?? '');
$aPaterno  = htmlspecialchars($_POST['aPaterno'] ?? '');
$aMaterno  = htmlspecialchars($_POST['aMaterno'] ?? '');
$user      = htmlspecialchars($_POST['user'] ?? '');
$password  = htmlspecialchars($_POST['password'] ?? '');
$email     = htmlspecialchars($_POST['email'] ?? '');

agregar($con, $nom, $aPaterno, $aMaterno, $user, $password, $email);

function agregar($con, $nom, $aPaterno, $aMaterno, $user, $password, $email){
    try{
        $consulta = "INSERT INTO usuarios (Nombre, aPaterno, aMaterno, Usuario, Contrasena, Correo) 
                    VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($consulta);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $con->error);
        }
        
        $stmt->bind_param("ssssss", $nom, $aPaterno, $aMaterno, $user, $password, $email);

        if ($stmt->execute()) {
            header("Location: ../HTML/index.php");
            exit;
        } else {
            echo "Error al insertar usuario: " . $stmt->error;
        }

        $stmt->close(); 
    }catch(Exception $e){
        echo "El error es: " . $e->getMessage();
    }
}
?>
