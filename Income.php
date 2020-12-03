<!-- session start and mysql connection files included here -->	
<?php include("./include/sessionCheck.php");
include("./include/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>PIS - Income</title>

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
				
                <h1>In<span class="gray">come</span></h1>
                <form id ="addNewIncForm" method = "post">
                <table class="table-expenses">
                    <tr>
                        <td>Income:</td>
                        <td><input type="text" id="catname" name ="income" maxlength="30" class="form-control" title="Max length 30 characters" required></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select id = "category" name ="category" class="form-control" required>
                                <option>Select Category</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Amount:</td>
                        <td><input type="text" id="amt" name ="amount" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Received By:</td>
                        <td>
                            <select id = "payBy" name ="payBy" class="form-control" required>
                                <option value = "Cash" selected>Cash</option>
                                <option value = "Debit Card">Debit Card</option>
                                <option value = "Phone Pay">Phone Pay</option>
                                <option value = "Google Pay">Google Pay</option>
                                <option value = "PayTm">PayTm</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td><input type="date" id="onDate" name ="onDate" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Remark:</td>
                        <td><!--<input type="text" name ="address" ></input> -->
                            <textarea id="remark" name ="remark" class="textareaRemark form-control" maxlength="100" title="Max length 100 characters" required></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type='submit' value ='Add Income' name ='addIncome' class="btn btn-success">
                        </td>
                    </tr>
                </table>
                </form>
                
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

        $('#category').load('./model/listIncCategory.php');

        $('#addNewIncForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './model/incomesModel.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                        location.href = 'Income.php';
                    }
                    else
                    {
                        alert(jsonData.errMsg);
                        $('#catname').val('');
                        $('#category').val('');
                        $('#amt').val('');
                        $('#payBy').val('');
                        $('#onDate').val('');
                        $('#remark').val('');  
                        $('#catname').focus();
                    }
               }
           });
         });
    });
    </script>

</body>
</html>
