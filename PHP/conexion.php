<?php
function conectar(){
    try{
        $tipo="localhost";
        $user="root";
        $password="Permon17";
        $db="pintegrador";

        $conectar=new mysqli($tipo, $user, $password, $db);
        
        return $conectar;
    }catch(Exception $e){
        echo "Error: ".$e->getMessage();
    }
}
?>