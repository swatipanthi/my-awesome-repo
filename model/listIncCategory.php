<?php 
include("../include/sessionCheck.php");
include("../include/connection.php");

if($conn){                          
    $sql1 = "SELECT inc_catid, inc_catname FROM income_category WHERE userid=$_SESSION[userid]";
    $selection=mysqli_query($conn,$sql1);
    $data='';
    while($row = mysqli_fetch_array($selection)){
        $data = $data."<option value='".$row['inc_catid']."'>".$row['inc_catname']."</option>";
            // $result[] = array(
            //     'id' => $row['inc_catid'],
            //     'name' => $row['inc_catname']
            //   );
    }
    //echo json_encode($result);
    echo $data;
}else
{
    header('Location:../IncomeCategory.php?msg=errSQL102');
   // echo json_encode(array('success' => 0, 'errMsg' => 'connection issue'));
}
?>