<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['img']);
	echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
?>