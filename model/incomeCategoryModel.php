<?php
include("../include/sessionCheck.php");

include("../include/connection.php");

if(isset($_POST['cname']) && isset($_POST['cdetail']))
{
    $cat_name=addslashes($_POST['cname']);
    $cat_details=addslashes($_POST['cdetail']);	
    $userid=$_SESSION['userid'];	

    if($conn){
           
        $sql1 = "INSERT INTO income_category(inc_catname, inc_catdetails, userid) VALUES('$cat_name', '$cat_details', '$userid')";
               
            $result=mysqli_query($conn,$sql1);
            if($result) {
                mysqli_close($conn);
                //header('Location:../IncomeCategory.php');
                echo json_encode(array('success' => 1, 'errMsg' => 'Record Inserted'));
            }else{
                //echo "error";
                //header('Location:../IncomeCategory.php?msg=errSQL101');
                echo json_encode(array('success' => 0, 'errMsg' => 'Record not inserted. query error'));
            }
        }else{
           //header('Location:../IncomeCategory.php?msg=errSQL102');
           echo json_encode(array('success' => 0, 'errMsg' => 'Not inserted. connection issue'));
       }

}else{
         //header('Location:../IncomeCategory.php?msg=err101');
         echo json_encode(array('success' => 0, 'errMsg' => 'Post data not retrieved'));
   }



?>