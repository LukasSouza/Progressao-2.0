<?php
	require_once('../core/db.php');
	session_start();
	session_destroy();
	unset($_SESSION);
	header('Location: ../../index.php');
?>