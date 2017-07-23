<?php 
	session_start();
	if (isset($_SESSION['admin'])) {
		
		unset($_SESSION['admin']);
		session_destroy();

		header("location: index.php");
		exit;
	}else{
		if (isset($_SESSION['standard'])) {
			unset($_SESSION['standard']);
			session_destroy();

			header("location: index.php");
			exit;
		}
	}

 ?>