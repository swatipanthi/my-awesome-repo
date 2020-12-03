<?php 
include("./include/connection.php");
        $total = 0;
        $sql1 = "SELECT acid, account, transaction_date, amount, operation FROM bank_book WHERE userid = $_SESSION[userid]";
        $result=mysqli_query($conn,$sql1);
        $sno = 0;                   
        if($result) {
                while($row2 = mysqli_fetch_array($result)){
                    $sno++;
                    $total = $total + $row2[2];
?>
<tr id="dynamictr" class = "cbtable-tr">
<td id="tbl-td"><?=$sno ?></td>
<td id="tbl-td"><?=$row2[1] ?></td>
<td id="tbl-td"><?=$row2[2] ?></td>
<td id="tbl-td"><?=$row2[3] ?></td>
<td id="tbl-td"><?=$row2[4] ?></td>
</tr>
<?php
                }  
        }else{
            //echo "error";
            header('Location:./BankBook.php');
        }
?>