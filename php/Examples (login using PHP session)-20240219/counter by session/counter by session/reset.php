<?php
	/*
		This script retrieves the session between this client and server pair.
		The session variable $_SESSION is retrieved.
	*/
	session_start();			//create or retrieve session
	session_destroy();			//destroy session
	$url=$_GET["home_url"];		//get parameters home_url submitted by form
	header("location: ".$url);	//redirect browser to where we came from
?>
