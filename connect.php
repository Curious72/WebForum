<?php


$database='Forum';
$user='root';
$pass='password';
$server='localhost';
$db=mysqli_connect($server,$user,$pass,$database);
if(!$db)
{

echo"Unable to connect ";
exit;
}


?>
