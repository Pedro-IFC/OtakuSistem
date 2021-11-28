<?php
	if (isset($_SESSION['id'])) {
		header('Location: ./principal.php');
	}else{
		header('Location: ./index.php');
	}
?>