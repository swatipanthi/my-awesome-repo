<?php
include("../include/connection.php");

if(isset($_POST['uname']) && isset($_POST['pwd']) )
{
       
        $usn=addslashes($_POST['uname']);
        $pwd=addslashes($_POST['pwd']);	

        if($conn)
        {          
            $sql1="SELECT userid,username, name FROM users WHERE username = '$usn' and password = '$pwd'";
            $result=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result) != 0) {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['name'] = $row['name'];
                $_SESSION['userid'] = $row['userid'];
                mysqli_close($conn);
                echo json_encode(array('success' => 1, 'errMsg' => 'Record Exists'));
                //echo json_encode(array('success' => 1, 'errMsg' => 'Record Exists', 'userid' => $_SESSION['userid']));
            }else{
                echo json_encode(array('success' => 0, 'errMsg' => 'No Record Exists'));

            }
        }else{
           echo json_encode(array('success' => 0, 'errMsg' => 'Connection not created'));
        }



}else{
         echo json_encode(array('success' => 0, 'errMsg' => 'Post fields are empty'));
       /*
        echo '<script type="text/javascript">  
                    window.location="../UserRegisteration.html?msg=err102"
                </script>';*/
   }



?>