<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "admin");
define("DB_NAME", "myapp_area");

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con){
    echo "Error en la conexion" . mysqli_connect_error();
} /*else {
    echo "Conexion exitosa";
}*/
