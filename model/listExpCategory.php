<?php 
include("../include/sessionCheck.php");
include("../include/connection.php");

if($conn){                          
    $sql1 = "SELECT exp_catid, exp_catname FROM expenses_category WHERE userid=$_SESSION[userid]";
    $selection=mysqli_query($conn,$sql1);
    $data='';
    while($row = mysqli_fetch_array($selection)){
        $data = $data."<option value='".$row['exp_catid']."'>".$row['exp_catname']."</option>";
            //echo("<option value='".$row['exp_catid']."'>".$row['exp_catname']."</option>");
            // $result[] = array(
            //     'section' => $row['exp_catid'],
            //     'subj_descr' => $row['exp_catname']
            //   );
    }
    //echo json_encode($result);
    echo $data;
}else
{
    //header('Location:../ExpenseCategory.php?msg=errSQL102');
    echo json_encode(array('success' => 0, 'errMsg' => 'connection issue'));
}
?>