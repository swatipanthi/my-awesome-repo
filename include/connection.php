<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$databasename = "personalinventorysystem";

//create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

//check connection
//if($conn){
//    echo "connection OK";
//}
//else{
//    die('connection failed ' . mysqli_connect_error());
//}
// if(! $conn ) {
//     die('Could not connect: ' . mysqli_connect_error());
//  }
?>

