<?php
$host="localhost";
$basedatos="carefood";
$usuario="root";
$contraseña="";

try {
        $conexion=new PDO("mysql:host=$host;dbname=$basedatos",$usuario,$contraseña );
     
} catch (Exception $ex) {

    echo $ex->getMessage();
}
?>