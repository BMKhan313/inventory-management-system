<?php
$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'maktaba2';
 $total_qty=null;
 $total_amount = null;
$con = new mysqli($localhost,$username,$password,$dbname);

if($con->connect_error){
	die("query failed: ".$con->connect_error);

}
session_start(); 


function authenticate(){
if(!isset($_SESSION['username'])){
header("Location:login.php");
die("Restricted Page Please go to Login");
}	
}

?>
