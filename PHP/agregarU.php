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
        // Verifica si ya existe un usuario
        $consUser="select * from usuarios where Usuario = '".$user ."'";
        $us = $con->query($consUser);

        // Verifica si ya existe un correo
        $consEmail="select * from usuarios where Correo = '".$email ."'";
        $mail = $con->query($consEmail);

        if ($us && $us->num_rows > 0){
            header("Location: ../HTML/index.php?error=3");
            exit;
        }else if ($mail && $mail->num_rows > 0){
            header("Location: ../HTML/index.php?error=2");
            exit;
        }else{
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
        }
    }catch(Exception $e){
        echo "El error es: " . $e->getMessage();
    }
}
?>
