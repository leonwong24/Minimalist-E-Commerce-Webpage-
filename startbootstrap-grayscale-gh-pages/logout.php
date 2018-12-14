<?php
		session_start();
		include_once 'connector.php';
?>


<?php
//unset customer id session
	session_destroy();

	//redirect to home page
	header('location:index.php');
	exit();

?>