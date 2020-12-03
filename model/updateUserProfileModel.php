<?php 
include("../include/sessionCheck.php");
include("../include/connection.php");
if(isset($_POST['uname']))
{
    $name=addslashes($_POST['name']);
    $uname=addslashes($_POST['uname']);	
    $pwd=addslashes($_POST['password']);
    $mbl=addslashes($_POST['phoneno']);	
    $email=addslashes($_POST['email']);
    $add=addslashes($_POST['address']);	
    $userid=$_SESSION['userid'];	
    //echo $userid;
    if($conn)
    {
           
        $sql1 = "UPDATE users SET name = '$name', username = '$uname', password = '$pwd', mobile = '$mbl', email = '$email', address = '$add' WHERE userid = '$userid'";

        $result=mysqli_query($conn,$sql1);
        if($result) {
            $_SESSION['name'] = $name;
            mysqli_close($conn);
            //header('Location:../UserProfile.php');
            echo json_encode(array('success' => 1, 'errMsg' => 'Record Updated'));
        }else{
            //echo "error";
            //header('Location:../UpdateUserProfile.php?msg=errSQL101');
            echo json_encode(array('success' => 0, 'errMsg' => 'Not Updated Query issue'));
        }
    }else{
        //header('Location:../UpdateUserProfile.php?msg=errSQL102');
        echo json_encode(array('success' => 0, 'errMsg' => 'Not updated connection issue'));
    }

}else
{
   // header('Location:../UpdateUserProfile.php?msg=err101');
    echo json_encode(array('success' => 0, 'errMsg' => 'Post data not retrived'));
}



?>