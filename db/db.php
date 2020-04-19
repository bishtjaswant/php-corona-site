<?php

define('DATABASE', 'corona_virus');
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');


$conn= mysqli_connect(HOST,USER,PASSWORD,DATABASE);

if (!$conn) {
    die('faiiled to conneect to db'); 
}