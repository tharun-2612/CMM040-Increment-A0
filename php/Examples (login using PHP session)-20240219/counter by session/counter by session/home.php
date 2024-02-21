<?php
	/*
		This simple example uses PHP session to store a counter value
		which can be accessed in different HTTP requests.
		
		To use PHP sessions, we usually have a session_start() PHP function
		call in the beginning of the page.
	*/
	session_start();		//If there is a session between this client and server
							//it will be retrieved.
							//If not, it will be created.
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>CMM503 Example</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="common.css">
	</head>
	<body>
		<h1>Visit Counter Using PHP Session</h1>
	
	<?php
		/*
			The session variable $_SESSION is preserved across
			different requests between the same client and server pair.
			
			$_SESSION is an associative array. So you can store values into it.
			
			Here we use the key "counter" to store the number
			of times this page has be visited.
			
			If $_SESSION["counter"] exists, we retrieve its value.
			If not, it means that this page has never been visited.
		*/
		if (IsSet($_SESSION["counter"]))
			$counter=$_SESSION["counter"];	//get counter value from session variable
		else $counter=0;
		
		$counter++;						//increment counter
		$_SESSION["counter"]=$counter;	//put it back into session variable
	?>
		<p>
			You have visited this page <?php echo $counter;?> times.
		</p>
		<!--
			This form is submitted to the URL reset.php, which
			resets the counter.
		-->
		<form method="get" action="reset.php">
			<!--
				This hidden field contains the URL of the current page,
				so that reset.php knows where to redirect the browser after
				its job is done.
			-->
			<input name="home_url" type="hidden" value="<?php echo $_SERVER["PHP_SELF"];?>">
			<button type="submit">Reset Counter</button>
		</form>
	</body>
</html>
