<?php 
/*$server= 'localhost';
$username= 'root';
$password= '';
$database= 'my_crud';
$port = '3308';*/

try{
//$conn = new PDO('mysql:host=$server;dbname=$database;port=$port', '$username','$password');

$conn = new PDO('mysql:host=localhost;dbname=my_crud;port=3308', 'root','');



}catch(PDOException $e)
{
die('conection failed'.$e->getMessage());
}

?>