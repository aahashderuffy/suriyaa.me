<?php
/* -------------------------------------------------------------------
Script written by Adam Khoury @ www.developphp.com
                          January 1, 2010
Please retain this credit when displaying this code online 
---------------------------------------------------------------------- */
$name = "";
$email = "";
$msg_to_user = "";
if ($_POST['name'] != "") {
	
	include_once "connect_to_mysql.php";
	
	// Be sure to filter this data to deter SQL injection, filter before querying database
	$name = $_POST['name'];
	$email = $_POST['email'];
	
	$sql = mysql_query("SELECT * FROM newsletter WHERE email='$email'");
    $numRows = mysql_num_rows($sql);
	
	if (!$email) {
		
		$msg_to_user = '<br /><br /><h4><font color="FF0000">Please type an email address ' . $name . '.</font></h4>';
	
	} else if ($numRows > 0) {
		
		$msg_to_user = '<br /><br /><h4><font color="FF0000">' . $email . ' is already in the system.</font></h4>';
		
	} else {
		
		$sql_insert = mysql_query("INSERT INTO newsletter (name, email, dateTime) 
												    VALUES('$name','$email',now() )")  or die (mysql_error());
		
		$msg_to_user = '<br /><br /><h4><font color="0066FF">Thanks ' . $name . ', you have been added successfully.</font></h4>';
		$name = "";
        $email = "";
	}
}

?>
<html>
<head>
<title>Subscribe to Our Newsletter</title>
</head>

<body>
<form style="width:440px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset style="text-align:left; padding:24px;"> 
<legend>Subscribe to Our Newsletter &nbsp;</legend> 
<br />
Name:<br />
<input name="name" type="text" maxlength="36" value="<?php echo $name; ?>" /><br /> 
Email:<br />
<input name="email" type="text" maxlength="36" value="<?php echo $email; ?>" /><br /><br />
<input name="mySubmitBtn" type="submit" value="Submit">
<?php echo $msg_to_user; ?>
</fieldset> 
</form>
</body>
</html>
