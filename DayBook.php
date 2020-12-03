<!-- session start and mysql connection files included here -->	
<?php include("./include/sessionCheck.php");
include("./include/connection.php");

$d1 = $_POST['onDate1'];
$d2 = $_POST['onDate2'];
if(isset($_POST['showDateData'])){
    $d1 = $_POST['onDate1'];
    $d2 = $_POST['onDate2'];
}else{
    $d1 = '';
    $d2 = '';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>PIS - Day Book</title>

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


<style>

#timetable {
    width :100%;
    margin :0 auto;
    text-align : left;
    border: none;
    
}
td.timetable {
    border: None;
}
th.timetable {
    border: None;
}

table.gridtable {
    width :100%;
    margin :0 auto;
    text-align : left;
    border: 1px solid #1B2455;
    
}

#gridtable, td, th{
    border-left: 1px solid #1B2455;
    }

th.gridtableth{
    padding: 5px;
    background-color : #000;
}

#gridtable td:first-child {
    border: none;
    }

#gridtable th:first-child {
    border: none;
    }
#gridtable tr {
    border: none;
}
</style>

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
				
                <h1>Day<span class="gray">Book</span></h1>
                <form action = "" method ='post'>
                <table class="cbtable">
                    <tr class = "cbtable-tr">
                        <td class = "cbtable-td"></td>
                        <td class = "cbtable-td">Date From</td>
                        <td class = "cbtable-td">To</td>
                        <td class = "cbtable-td"></td>
                    </tr>
                    <tr class = "cbtable-tr">
                        <td class = "cbtable-td">Day Book</td>
                        <td class = "cbtable-td"><input type="date" name ="onDate1" value="<?=$d1?>" class="form-control datebox"></td>
                        <td class = "cbtable-td"><input type="date" name ="onDate2" value='<?=$d2?>' class="form-control datebox"></td>
                        <td class = "cbtable-td"><input type='submit' value ='Show' name ='showDateData' class="btn btn-success"></td>
                        <td class = "cbtable-td"><input type='submit' value ='Clear' name ='showAllDateData' class="btn btn-primary"></td>
                    </tr>
                </table>
                </form>
                <table class="cbtable2">
                    <tr class="cbtable-tr">
                        <th class = "cbtable-th">S. No.</th>
                        <th class = "cbtable-th">Account Name</th>
                        <th class = "cbtable-th">Date</th>
                        <th class = "cbtable-th">Amount</th>
                        <th class = "cbtable-th">Pay/Receive</th>
                        <th class = "cbtable-th">Remark</th>
                    </tr>
                    <tr class="cbtable-tr"><td colspan = "6">Expenses</td></tr>
                    <?php 
                    if(isset($_POST['showDateData']))
                    {
                        include("./model/dayBookShowModel.php"); 
                    }
                    else if(isset($_POST['showAllDateData']))
                    {
                        include("./model/dayBookClearModel.php"); 
                    }
                    else{
                      include("./model/dayBookClearModel.php"); 
                    }
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
</body>
</html>
