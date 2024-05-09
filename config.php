<?php

$conn = mysqli_connect('localhost','root','','ngo');

if($conn)
{

}
else
{
die("Connection failed because:".mysqli_connect_error());
}


?>