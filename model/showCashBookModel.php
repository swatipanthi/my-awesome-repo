<?php 
include("./include/connection.php");
$total = 0;
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

if(isset($_POST['showDateData']))
{
    $date1=addslashes($_POST['onDate1']);
    $date2=addslashes($_POST['onDate2']);
    if($date1){
        if(empty($date2)){
            $date2 = $today;
        }
    }
    
    if($date1 and $date2){
        
        $sql1 = "SELECT acid, account, transaction_date, amount, operation FROM cash_book WHERE (transaction_date BETWEEN CAST('$date1' AS DATE) AND CAST('$date2' AS DATE)) AND userid=$_SESSION[userid]";
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
            header('Location:./CashBook.php');
            }
}}
?>