<?php
include("../include/sessionCheck.php");

include("../include/connection.php");

if(isset($_POST['expenses']) && isset($_POST['category']) && isset($_POST['amount']) && isset($_POST['payBy']) && isset($_POST['onDate']) && isset($_POST['remark']))
{
    $expense=addslashes($_POST['expenses']);
    $amt=addslashes($_POST['amount']);
    $onDate=addslashes($_POST['onDate']);   
    $remark=addslashes($_POST['remark']);

    $catid=addslashes($_POST['category']); 
    $payBy=addslashes($_POST['payBy']);

    $userid=$_SESSION['userid'];

    if($conn){
           
        $sql1 = "INSERT INTO expenses(exp_ac, userid, exp_catid, amount, transaction_date, payby, remark) VALUES('$expense', '$userid', '$catid', '$amt', '$onDate', '$payBy', '$remark')";
        $result1=mysqli_query($conn,$sql1);

        if($payBy == 'Cash'){
            $sql3 = "INSERT INTO cash_book(account, transaction_date, amount, userid, operation) VALUES('$expense','$onDate','$amt','$userid','Pay')";
            $result3=mysqli_query($conn,$sql3);
        }else{
            $sql2 = "INSERT INTO bank_book(account, transaction_date, amount, userid, operation) VALUES('$expense','$onDate','$amt','$userid','Pay')";
            $result2=mysqli_query($conn,$sql2);
        }

        if($result1 and ($result2 or $result3)) {
            mysqli_close($conn);
            //header('Location:../Expenses.php');
            echo json_encode(array('success' => 1, 'errMsg' => 'Record Inserted'));
        }else{
            //echo "error";
            //header('Location:../Expenses.php?msg=errSQL101');
            echo json_encode(array('success' => 0, 'errMsg' => 'Record not inserted. query error'));
        }
    }
    else{
           //header('Location:../Expenses.php?msg=errSQL102');
           echo json_encode(array('success' => 0, 'errMsg' => 'Not inserted. connection issue'));
    }

}else{
         //header('Location:../Expenses.php?msg=err101');
         echo json_encode(array('success' => 0, 'errMsg' => 'Post data not retrieved'));
   }

?>