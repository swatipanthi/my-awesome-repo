<?php 
include("../include/sessionCheck.php");
include("../include/connection.php");
# Expense Category add here:..............

if(isset($_POST['expname']) && isset($_POST['expdetail']))
{
    $cat_name=addslashes($_POST['expname']);
    $cat_details=addslashes($_POST['expdetail']);	
    $userid=$_SESSION['userid'];	
    //echo $userid;

    if($conn){
           
        $sql1 = "INSERT INTO expenses_category(exp_catname, exp_catdetails, userid) VALUES('$cat_name', '$cat_details', '$userid')";
               
        $result=mysqli_query($conn,$sql1);
        if($result) {
            mysqli_close($conn);
           // header('Location:../ExpenseCategory.php?msg=success');
            echo json_encode(array('success' => 1, 'errMsg' => 'Record Inserted'));
        }else{
            //echo "error";
            //header('Location:../ExpenseCategory.php?msg=errSQL101');
            echo json_encode(array('success' => 0, 'errMsg' => 'Record not inserted. query error'));
        }
    }else
    {
        //header('Location:../ExpenseCategory.php?msg=errSQL102');
        echo json_encode(array('success' => 0, 'errMsg' => 'Not inserted. connection issue'));
    }

}else
{
    //header('Location:../ExpenseCategory.php?msg=err101');
    echo json_encode(array('success' => 0, 'errMsg' => 'Post data not retrieved'));
       /*
        echo '<script type="text/javascript">  
                    window.location="../UserRegisteration.html?msg=err102"
                </script>';*/
}
?>