<?php
		session_start();
		include_once 'connector.php';
?>


<?php
//unset customer id session
	unset($_SESSION['custid']);

	//redirect to home page
	header('location:index.php');
	exit();

?>