<!-- session start and mysql connection files included here -->	
<?php include("./include/sessionCheck.php");
include("./include/connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>PIS - Expense Category</title>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="author" content="Erwin Aligam - styleshout.com" />
<meta name="description" content="Site Description Here" />
<meta name="keywords" content="keywords, here" />
<meta name="robots" content="index, follow, noarchive" />
<meta name="googlebot" content="noarchive" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="images/Azulmedia.css" />
<link rel="stylesheet" type="text/css" media="screen" href="assets/style.css" />

</head>
<body>
<div class="container">

<!-- wrap starts here -->
<div id="wrap">

	<!-- header starts here -->	
    <?php include("./include/header.php"); ?>
	<!-- header ends here -->	
				
	<!-- content-wrap starts here -->
	<div id="content-wrap">	 
	
		<div id="main">
		
			<a name="TemplateInfo"></a>			
			<div class="box">
				
                <h1>Expense <span class="gray">Category</span></h1>

                <?php 
                    if(isset($_POST['opt_delete']))
                    {
                        //$conn=mysqli_connect('localhost','root','mysql','personalinventorysystem');                       
                                
                        $sql11 = "DELETE FROM expenses_category WHERE exp_catid=".$_POST['opt_delete'];

                        $result=mysqli_query($conn,$sql11);
                        if($result === 0) {
                            //echo "<script>alert('Record Deleted');</script>";
                            mysqli_close($conn);        
                        }
                    }
                    if(isset($_POST['opt_update']))
                    {
                        //$conn=mysqli_connect('localhost','root','mysql','personalinventorysystem');                       

                        $sql11 = "SELECT exp_catid, exp_catname, exp_catdetails FROM expenses_category WHERE exp_catid=".$_POST['opt_update'];
 
                        $data=mysqli_query($conn,$sql11);
                        $val=mysqli_fetch_array($data);
                    
                ?>

                <form id = "updateExpform" method ="post">
                    <table id ="uptableExpCat" class="catTable" >
                        <tr>
                            <td>Category Name:</td>
                            <td><input type="text" id="catname" name ="expname" value="<?=$val['exp_catname']?>" maxlength="30" class="form-control" title="Max length 30 characters" required></td>
                        </tr>
                        <tr>
                            <td>Category Details:</td>
                            <td><input type="text" id="catdetail" name ="expdetail" value="<?=$val['exp_catdetails']?>" maxlength="40" class="form-control" title="Max length 40 characters" required></td>
                        </tr>
                        <tr>
                            <td>
                                <!-- <input type='submit' value ='Update' name ='Update' ></input> -->
                                <button type='submit' value ='<?=$val['exp_catid']?>' name ='Update' class="btn btn-success">Update</button>

                            </td>
                            <td>
                                <input type='reset' value ='Cancel' name ='Cancel' class="btn btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>

                <?php
                    }else { 
                ?>
                <form id = "addExpform" method ="post">
                    <table id ="uptableExpCat" class="catTable">
                        <tr>
                            <td>Category Name:</td>
                            <td><input type="text" id="catname" name ="expname" maxlength="30" class="form-control" title="Max length 30 characters" required></td>
                        </tr>
                        <tr>
                            <td>Category Details:</td>
                            <td><input type="text" id="catdetail" name ="expdetail" maxlength="40" class="form-control" title="Max length 40 characters" required></td>
                        </tr>
                        <tr>
                            <td>
                                <input type='submit' value ='Add' id ="Add_Exp" name ='Add_Exp' class="btn btn-success">
                            </td>
                            <td>
                                <input type='reset' value ='Cancel' name ='Cancel' class="btn btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php } ?>             
                <hr id="hr1">
                <br/>
                <table id ="grid-tableExpCat" class="gridCatTable">
                    <tr id ="grid-tr-ExpCat" class="gridCatTblTr">
                        <th id ="grid-th-ExpCat" class="gridCatTblTh">Category Name</th>
                        <th id ="grid-th-ExpCat" class="gridCatTblTh">Category Details</th>
                        <th id ="grid-th-ExpCat" class="gridCatTblTh">Edit</th>
                        <th id ="grid-th-ExpCat" class="gridCatTblTh">Delete</th>
                    </tr>

                    <?php 
                        #$conn=mysqli_connect('localhost','root','mysql','personalinventorysystem');
                        $sql1 = "SELECT exp_catid, exp_catname, exp_catdetails FROM expenses_category WHERE userid = $_SESSION[userid]";
                        $result=mysqli_query($conn,$sql1);

                        while($row2 = mysqli_fetch_array($result)){
                    ?>
                            <form method="post">
                                <tr id ='grid-tr-ExpCat' class="gridCatTblTr">
                                    <td id ='grid-td-ExpCat' class="gridCatTblTd"><?=$row2[1] ?></td>
                                    <td id ='grid-td-ExpCat' class="gridCatTblTd"><?=$row2[2] ?></td>
                                    <td id ='grid-td-ExpCat' class="gridCatTblTd">
                                        <button type='submit' value ='<?=$row2[0]?>' name ='opt_update' class='btn btn-primary btn-xs' formaction="ExpenseCategory.php">Edit</button>
                                    </td>
                                    <td id ='grid-td-ExpCat' class="gridCatTblTd">
                                        <button type='submit' value ='<?=$row2[0]?>' name ='opt_delete' class='btn btn-primary btn-xs' formaction="ExpenseCategory.php">Delete</button>
                                    </td>
                                </tr>
                            </form>
                    <?php    
                        }
                            mysqli_close($conn);                                       
                    ?>
                </table>
				                
			</div>
										
		</div>
	
<!-- side bar starts here -->		
<?php include("./include/sidebar.php"); ?>
<!-- side-bar ends here -->		
<br />
<div class="clear"></div>
<!-- content-wrap ends here -->		
</div>	

<!-- wrap ends here -->
</div>

<!-- footer starts here -->	
<?php include("./include/footer.php"); ?>
<!-- footer ends here -->	
</div>
<script src="assets/validations_category.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#addExpform').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './model/expenseCategoryModel.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                        location.href = 'ExpenseCategory.php';
                    }
                    else
                    {
                        alert(jsonData.errMsg);
                        $('#catname').val('');
                        $('#catdetail').val('');
                        $('#catname').focus();
                    }
               }
           });
         });

         $('#updateExpform').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './model/expenseCategoryUpdateModel.php',
                data: $(this).serialize(),
                success: function(response)
                {   
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                        location.href = 'ExpenseCategory.php';
                    }
                    else
                    {
                        alert(jsonData.errMsg);
                        $('#catname').val('');
                        $('#catdetail').val('');
                        $('#catname').focus();
                    }
               }
           });
         });
    });
    </script>
</body>
</html>
