<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Otaku</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>   
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/temaEscuro.css">   
	<?php
		session_start();
		include_once "../../conf/default.inc.php";
     	require_once "../../conf/Conexao.php";
		include 'auto_login2.php';
		include 'functions.php';
		$option=isset($_GET['option'])?$_GET['option']:"null";
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="center">
				<h1><a class="link color-gold" href="index.php">Trocar nome</a></h1>
			</div>
			<div class="fixed">
				<form method="POST">
					<span>Novo nome:</span>
						<input type="text" name="nome" class="input"><br>
					<span>Senha:</span>
						<input type="password" name="senha" class="input"><br>
					<button type="submit" name="trocar" class="blacktxt btn jojobtnL waves-effect waves-black">Logar <i class="material-icons right">send</i></button>
					<a href="../../perfil.php" class="blacktxt btn jojobtnR waves-effect waves-black">Voltar</a>
				</form>
			</div>
		</div>
	</div>

<?php
	if(isset($_POST['trocar'])){
		if($_POST['nome']!="" and $_POST['senha']!=""){
			$pdo = Conexao::getInstance(); 
			$dados=allFromUser($id);
			$nome=filter_input(INPUT_POST,'nome');
			$Email=$dados['email'];
			$senha=md5(filter_input(INPUT_POST, 'senha'));
			$sql="SELECT COUNT(*) FROM USUARIO WHERE email = '$Email';";
			$consulta = $pdo->query($sql);
			$count=$consulta->fetch(PDO::FETCH_BOTH);
			if ($count['COUNT(*)']>0) {		
				$sql="SELECT COUNT(*) FROM USUARIO WHERE email = '$Email' and senha='$senha';";
				$consulta = $pdo->query($sql);
				$count=$consulta->fetch(PDO::FETCH_BOTH);
				if ($count['COUNT(*)']>0) {		
					$sql="UPDATE USUARIO SET nome='$nome' WHERE id='$id'";
					$consulta = $pdo->query($sql);
					$_SESSION['msg']='Nome alterado com sucesso de '.$dados["nome"].' para '.$nome;
					header('Location: ../../perfil.php');
				}else{
					$_SESSION['msg']="Não é possivel alterar esse usuario, senha incorreta";
					header('Location: ./index.php');
				}
			}else{
				$_SESSION['msg']="Não é possivel alterar o nome desse usuario, pois o email não consta na base de dados";
				header('Location: ./index.php');
			}
		}else{
			$_SESSION['msg']="Não foi possivel alterar com o usuário, os campos estão preenchidos de forma incorreta";
			header('Location: ./index.php?option=cadastrar');
		}
	}
?>
</body>
</html>