<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Otaku principal</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/temaEscuro.css">   
	<?php
		session_start();
		$id=$_SESSION['id'];
		include_once "conf/default.inc.php";
     	require_once "conf/Conexao.php";
	?>
</head>
<body id="principal">
	<div class="container">
		<div class="row">
			<div class=center>
				<h1><a class="link color-gold" href="index.php">Otaku</a></h1>
			</div>
			<div class="fixed-action-btn">
			  	<a class="btn btn-large light-blue darken-4 waves-effect waves-light" href="perfil.php?id=<?php echo $id;?>">
			    	<i class="large material-icons">account_circle</i>
			  	</a>
			  	<ul>
			   	 	<li><a href="assets/php/sair.php" class="btn  light-blue accent-2  waves-effect waves-light"><i class="material-icons">clear</i></a></li>
			    	<li><a class="btn teal  waves-effect waves-light"><i class="material-icons">explore</i></a></li>
			    	<li><a class="btn cyan darken-3  waves-effect waves-light"><i class="material-icons">insert_photo</i></a></li>
			  	</ul>
			</div>
		</div>
		<div class="row">
			
		</div>
	</div>
</body>
 	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</html>