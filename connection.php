<?php

$servername="localhost";
$username="root";
$password="";
$database="form_db";

$con=mysql{_connect($servername,$username,$password,$database);
if ($con){
    die("Database connection is successful.");
}
}
?>