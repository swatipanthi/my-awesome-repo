<!-- session start and mysql connection files included here -->	
<?php
include("./include/connection.php");

$userid=$_SESSION['userid'];
//echo $userid;


if($conn)
{
    $sql11 = "SELECT name, username, password, mobile, email, address FROM users WHERE userid='$userid'";
    $data=mysqli_query($conn,$sql11);
    $val=mysqli_fetch_array($data);
}else { 
    header('Location:../UpdateUserProfile.php?msg=errSQL101');
    // echo "eror";
}





?>