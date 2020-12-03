<?php 
include("../include/connection.php");

if(isset($_POST['Update']))
{
    $cat_name=addslashes($_POST['cname']);
    $cat_details=addslashes($_POST['cdetail']);	
    $userid=$_SESSION['userid'];	
    //echo $userid;
    if($conn)
    {
           
        $sql1 = "UPDATE income_category SET inc_catname = '$cat_name', inc_catdetails = '$cat_details' WHERE inc_catid = '$_POST[Update]'";
        //echo $sql1;        
        $result=mysqli_query($conn,$sql1);
        //var_dump($result);
        if($result) {
            mysqli_close($conn);
            header('Location:../IncomeCategory.php');
        }else{
            //echo "error";
            header('Location:../IncomeCategory.php?msg=errSQL101');
        }
    }else{
        header('Location:../IncomeCategory.php?msg=errSQL102');
    }

}else
{
    header('Location:../IncomeCategory.php?msg=err101');
       /*
        echo '<script type="text/javascript">  
                    window.location="../UserRegisteration.html?msg=err102"
                </script>';*/
}



?>