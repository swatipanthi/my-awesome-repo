<?php
// Start the session
session_start();
if(!isset($_SESSION['name'])){
    header('Location:./Login.html?msg=InvalidUser');
}
//echo $_SESSION['userid'];
?>