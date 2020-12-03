<?php

include("../include/connection.php");

if(isset($_POST['name']) && isset($_POST['uname']) && isset($_POST['pwd']) && isset($_POST['confpwd']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address']))
{
    $name=addslashes($_POST['name']);
    $usn=addslashes($_POST['uname']);
    $pwd=addslashes($_POST['pwd']);	
    $phone=addslashes($_POST['phone']);
    $email=addslashes($_POST['email']);
    $address=addslashes($_POST['address']);

    if($conn){
            $sql1="INSERT INTO users( username, password, name, address, mobile, email) VALUES ('$usn','$pwd','$name','$address','$phone','$email')";
            $result=mysqli_query($conn,$sql1);
            if($result == 1){
                echo json_encode(array('success' => 1, 'errMsg' => 'Record Inserted'));
            }else{
                echo json_encode(array('success' => 0, 'errMsg' => 'Query Issue'));
            }
            mysqli_close($conn);

       }else{
           echo json_encode(array('success' => 0, 'errMsg' => 'connection Issue'));
       }
   }else{
         echo json_encode(array('success' => 0, 'errMsg' => 'POST data not retrived'));
   }
?>