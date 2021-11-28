<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Perfil</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/temaEscuro.css">   
	<?php
		session_start();
		$id=$_SESSION['id'];
		include_once "conf/default.inc.php";
     	require_once "conf/Conexao.php";
		include 'assets/php/notificador.php';
     	require_once "assets/php/functions.php";
     	$dados=allFromUser($id);
     	$url=ImagemDePerfilUrl($id);
	?>
</head>
<body id="principal">
	<div class="container">
		<div class="row">
			<div class="left">
				<h5><a class="link" href="principal.php">Voltar</a></h5>
			</div>
		</div>
		<div class="row">
			<div class="col s8 border">
				<img class="img" width="30%" src="<?php echo $url; ?>">
				<h3><a class="link color-gold"><?php echo ucfirst($dados['nome']);?></a></h3>
				<p class="dados">Idade: <?php echo Idade($dados["dataNasc"])?></p>
				<p class="dados">E-mail: <?php echo $dados["email"];?></p>
				<p class="dados">
					Alterar dados de perfil [ <a class="link" href="assets/php/trocarnome.php?id=<?php echo $dados['id']?>">Nome</a>, <a class="link" href="assets/php/trocarsenha.php?id=<?php echo $dados['id']?>">Senha</a> ]
				</p>
			</div>
		</div>
	</div>
</body>
 	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</html>