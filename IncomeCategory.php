<!-- session start and mysql connection files included here -->	
<?php include("./include/sessionCheck.php");
include("./include/connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>PIS - Income Category</title>

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
				
                <h1>Income <span class="gray">Category</span></h1>
                
                <?php 
                    if(isset($_POST['opt_delete']))
                    {
                        //$conn=mysqli_connect('localhost','root','mysql','personalinventorysystem');                       
                                
                        $sql11 = "DELETE FROM income_category WHERE inc_catid=".$_POST['opt_delete'];

                        $result=mysqli_query($conn,$sql11);
                        if($result === 0) {
                            //echo "<script>alert('Record Deleted');</script>";
                            mysqli_close($conn);        
                        }
                    }
                    if(isset($_POST['opt_update']))
                    {
                        //$conn=mysqli_connect('localhost','root','mysql','personalinventorysystem');                       

                        $sql11 = "SELECT inc_catid, inc_catname, inc_catdetails FROM income_category WHERE inc_catid=".$_POST['opt_update'];
 
                        $data=mysqli_query($conn,$sql11);
                        $val=mysqli_fetch_array($data);
                    
                ?>

                <form id="updateIncform" action = "./model/incomeCategoryUpdateModel.php" method ="post">

                <table id ="uptableInc-Cat" class="catTable">
                        <tr>
                            <td>Category Name:</td>
                            <td><input type="text" id="catname" name ="cname" value="<?=$val['inc_catname']?>" maxlength="30" class="form-control" title="Max length 30 characters" required></td>
                        </tr>
                        <tr>
                            <td>Category Details:</td>
                            <td><input type="text" id="catdetail" name ="cdetail" value="<?=$val['inc_catdetails']?>" maxlength="40" class="form-control" title="Max length 40 characters" required></td>
                        </tr>
                        <tr>
                            <td>
                                <button type='submit' value ='<?=$val['inc_catid']?>' name ='Update' class="btn btn-success">Update</button>
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
                <form id="addIncForm" method ="post">
                <table id ="uptableInc-Cat" class="catTable">
                    <tr>
                        <td>Category Name:</td>
                        <td><input type="text" id="catname" name ="cname" maxlength="30" class="form-control" title="Max length 30 characters" required></td>
                    </tr>
                    <tr>
                        <td>Category Details:</td>
                        <td><input type="text" id="catdetail" name ="cdetail" maxlength="40" class="form-control" title="Max length 40 characters" required></td>
                    </tr>
                    <tr>
                        <td>
                            <input type='submit' value ='Add' name ='Add_Inc' class="btn btn-success">
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
                <table id ="grid-table-InCat"class="gridCatTable">
                    <tr id ="grid-tr-InCat" class="gridCatTblTr">
                        <th id ="grid-th-InCat" class="gridCatTblTh">Category Name</th>
                        <th id ="grid-th-InCat" class="gridCatTblTh">Category Details</th>
                        <th id ="grid-th-InCat" class="gridCatTblTh">Edit</th>
                        <th id ="grid-th-InCat" class="gridCatTblTh">Delete</th>
                    </tr>

                    <?php 
                        #$conn=mysqli_connect('localhost','root','mysql','personalinventorysystem');
                        $sql1 = "SELECT inc_catid, inc_catname, inc_catdetails FROM income_category WHERE userid = $_SESSION[userid]";
                        $result=mysqli_query($conn,$sql1);

                        while($row2 = mysqli_fetch_array($result)){
                    ?>
                        <form method="post">
                            <tr id ='grid-tr-InCat' class="gridCatTblTr">
                                <td id ='grid-td-InCat' class="gridCatTblTd"><?=$row2[1] ?></td>
                                <td id ='grid-td-InCat' class="gridCatTblTd"><?=$row2[2] ?></td>
                                <td id ='grid-td-InCat'class="gridCatTblTd">
                                    <button type='submit' value ='<?=$row2[0]?>' name ='opt_update' class='btn btn-primary btn-xs' formaction="IncomeCategory.php">Edit</button>
                                </td>
                                <td id ='grid-td-InCat' class="gridCatTblTd">
                                    <button type='submit' value ='<?=$row2[0]?>' name ='opt_delete' class='btn btn-primary btn-xs' formaction="IncomeCategory.php">Delete</button>
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
        $('#addIncForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './model/incomeCategoryModel.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                        location.href = 'IncomeCategory.php';
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

        //  $('#updateIncform').submit(function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         type: "POST",
        //         url: './model/incomeCategoryUpdateModel.php',
        //         data: $(this).serialize(),
        //         success: function(response)
        //         {   
        //             var jsonData = JSON.parse(response);
        //             if (jsonData.success == "1")
        //             {
        //                 location.href = 'IncomeCategory.php';
        //             }
        //             else
        //             {
        //                 alert(jsonData.errMsg);
        //                 $('#catname').val('');
        //                 $('#catdetail').val('');
        //                 $('#catname').focus();
        //             }
        //        }
        //    });
        //  });
    });
    </script>

</body>
</html>
