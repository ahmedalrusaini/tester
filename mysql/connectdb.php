<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="tester";
$conn=mysqli_connect($hostname,$username,$password,$dbname);
if (!$conn) {//die stop conn
    die("Connection failed :".mysqli_connect_error()." No. :".mysqli_connect_errno());
    
}
mysqli_character_set_name($conn);
mysqli_set_charset($conn, "utf8");
?>