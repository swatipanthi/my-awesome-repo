<?php 
include("./include/connection.php");

    
        $sql1 = "SELECT exp_id, exp_ac, transaction_date, amount, payby, remark FROM expenses WHERE userid=$_SESSION[userid]";
        $sql2 = "SELECT inc_id, inc_ac, transaction_date, amount, receivby, remark FROM incomes WHERE userid=$_SESSION[userid]";

        $result1=mysqli_query($conn,$sql1);
        $result2=mysqli_query($conn,$sql2);
        $sno1 = 0;  
        $sno2 = 0;  
        if($result1) {
            while($row2 = mysqli_fetch_array($result1)){
                    $sno1++;
?>

                    <tr class="cbtable-tr">
                        <td id="tbl-td"><?=$sno1 ?></td>
                        <td id="tbl-td"><?=$row2[1] ?></td>
                        <td id="tbl-td"><?=$row2[2] ?></td>
                        <td id="tbl-td"><?=$row2[3] ?></td>
                        <td id="tbl-td"><?=$row2[4] ?></td>
                        <td id="tbl-td"><?=$row2[5] ?></td>
                    </tr>
<?php
                }  
        }
?>
    <tr class="cbtable-tr"><td colspan = "6">Incomes</td></tr>

<?php
    if($result2) {
        while($row2 = mysqli_fetch_array($result2)){
                $sno2++;
?>
                    <tr class="cbtable-tr">
                        <td id="tbl-td"><?=$sno2 ?></td>
                        <td id="tbl-td"><?=$row2[1] ?></td>
                        <td id="tbl-td"><?=$row2[2] ?></td>
                        <td id="tbl-td"><?=$row2[3] ?></td>
                        <td id="tbl-td"><?=$row2[4] ?></td>
                        <td id="tbl-td"><?=$row2[5] ?></td>
                    </tr>
<?php
        }
    }
    

?>
