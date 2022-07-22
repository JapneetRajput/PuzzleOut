<?php

define('DB_SERVER','localhost');
define('DB_USERNAME','Japneet');
define('DB_PASSWORD','Japneet');
define('DB_NAME','order');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if($conn == false){
    dir('Error: Cannot connect');
}

?>