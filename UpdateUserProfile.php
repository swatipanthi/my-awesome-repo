<?php
include("./include/sessionCheck.php");
include("./model/updateUserProfile.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>PIS - Update User Profile</title>

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
				
                <h1>Update <span class="gray">USER Profile</span></h1>
                <form id ="updateUserProfileForm" method ="post">
                <table id="userProfileTable">
                <tr>
                        <td>Name:</td>
                        <td><input type="text" id="name" name ="name" value="<?=$val['name']?>" class="form-control" maxlength="45" required></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td><input type="text" id="uname" name ="uname" value="<?=$val['username']?>" class="form-control" maxlength="12" title="Max length 12 characters" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" id ="pwd" name ="password" value="<?=$val['password']?>" class="form-control" maxlength="6" title="Max length 6 characters" required></td>
                    </tr>
                    <tr>
                        <td>Phone No:</td>
                        <td><input type="text" id ="phone" name ="phoneno" pattern="[6-9]{1}[0-9]{9}" value="<?=$val['mobile']?>" class="form-control" title="Phone number with 6-9 and remaing 9 digit with 0-9" required></td>
                    </tr>
                    <tr>
                        <td>Email Id:</td>
                        <td><input type="email" id="email" name ="email" value="<?=$val['email']?>" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td>
                        <input type="text" name ="address" id="address" value="<?=$val['address']?>" class="form-control" maxlength="100" title="Max length 100 characters" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type='submit' value ='Update' name ='updateUser' class="btn btn-success" >
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
<script src="assets/validations.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#updateUserProfileForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'model/updateUserProfileModel.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    // user is logged in successfully in the back-end
                    // let's redirect
                    if (jsonData.success == "1")
                    { 
                        location.href = 'UserProfile.php';
                    }
                    else
                    {
                        alert(jsonData.errMsg);
                    }
               }
           });
         });
    });
    </script>

</body>
</html>
