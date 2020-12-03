<?php 
include("./include/connection.php");

$sql1 = "SELECT inc_ac, amount, transaction_date FROM incomes WHERE userid=$_SESSION[userid]";
$sql2 = "SELECT exp_ac, amount, transaction_date FROM expenses WHERE userid=$_SESSION[userid]";

$result1=mysqli_query($conn,$sql1);
$result2=mysqli_query($conn,$sql2);
        
$rowCount1 = mysqli_num_rows($result1);
$rowCount2 = mysqli_num_rows($result2);

$count1 = 0; $count2 = 0;

            for($i = 0; $i < $rowCount1 || $i < $rowCount2; $i++){
                    $row1 = mysqli_fetch_array($result1);
                    $row2 = mysqli_fetch_array($result2);
                    $count1 = $count1 + $row1[1];
                    $count2 = $count2 + $row2[1];

?>
                    <tr>
                        <td id="tbl-td"><?=$row1[0] ?></td>
                        <td id="tbl-td"><?=$row1[2] ?></td>
                        <td id="tbl-td"><?=$row1[1] ?></td>
                        <td id="tbl-td"><?=$row2[0] ?></td>
                        <td id="tbl-td"><?=$row2[2] ?></td>
                        <td id="tbl-td"><?=$row2[1] ?></td>
                    </tr>
<?php    
        }
    
        mysqli_close($conn);      
                               
?>