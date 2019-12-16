<?php
session_start();
include_once 'clases/BaseDeDato.php';
include_once 'clases/BaseJson.php';
include_once 'clases/Validador.php';
include_once 'clases/BaseSQL.php';
include_once 'clases/Usuario.php';

$baseJson = new BaseJson('db.json');
$bd = BaseSQL::conexion();

?>