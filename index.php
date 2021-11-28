<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Otaku</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>   
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/temaEscuro.css">   
	<?php
		session_start();
		include_once "conf/default.inc.php";
     	require_once "conf/Conexao.php";
		if (isset($_SESSION['id'])) {
			header('Location: ./principal.php');
		}	
		include 'assets/php/notificador.php';
		$option=isset($_GET['option'])?$_GET['option']:"null";
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class=center>
				<h1><a class="link color-gold" href="index.php">Otaku</a></h1>
			</div>
			<?php
				if ($option=='login') {
					include "./assets/php/login.php";
				}elseif($option=='cadastrar'){
					include "./assets/php/cadastrar.php";
				}
			?>
			<div class="col s3 offset-s1 especial">
				<h3><a class="link" href="index.php?option=login">Entrar</a><br><div class="color-gold-especial"></div><a class="link" href="index.php?option=cadastrar">Cadastrar</a></h3>
			</div>
		</div>
	</div>
</body>
</html>