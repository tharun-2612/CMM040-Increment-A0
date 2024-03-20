<?php
session_start();

$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to index page
header("Location: index.php");
exit;