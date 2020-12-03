<?php 
include("../include/sessionCheck.php");

include("../include/connection.php");

if(isset($_POST['expname']) && isset($_POST['expdetail']))
{
    $cat_name=addslashes($_POST['expname']);
    $cat_details=addslashes($_POST['expdetail']);	
    $userid=$_SESSION['userid'];	
    //echo $userid;
    if($conn)
    {          
        $sql1 = "UPDATE expenses_category SET exp_catname = '$cat_name', exp_catdetails = '$cat_details' WHERE exp_catid = '$_POST[Update]'";
        $result=mysqli_query($conn,$sql1);
        if($result) {
            mysqli_close($conn);
            //header('Location:../ExpenseCategory.php');
            echo json_encode(array('success' => 1, 'errMsg' => 'Record Inserted'));
        }else{
            //echo "error";
            //header('Location:../ExpenseCategory.php?msg=errSQL101');
            echo json_encode(array('success' => 0, 'errMsg' => 'Record not inserted. query error'));
        }
    }else{
        //header('Location:../ExpenseCategory.php?msg=errSQL102');
        echo json_encode(array('success' => 0, 'errMsg' => 'Record not inserted. connection error'));
    }

}else
{
    //header('Location:../ExpenseCategory.php?msg=err101');
    echo json_encode(array('success' => 0, 'errMsg' => 'Post data not recieved'));
}



?>