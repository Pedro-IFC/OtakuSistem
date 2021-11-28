<div class="fixed">
	<a class="fechar" href="index.php"><i class="material-icons">clear</i></a>
	<h5 class="color-gold">Login</h5>
	<form method="POST">
		<span>Nome ou e-mail:</span>
			<input type="email" name="Email" class="input"><br>
		<span>Senha:</span>
			<input type="password" name="senha" class="input"><br>
		<button type="submit" name="entrar" class="blacktxt btn blacktxt waves-effect waves-light">Logar <i class="material-icons right">send</i></button>
	</form>
</div>

<?php
	if(isset($_POST['entrar'])){
		if($_POST['Email']!="" and $_POST['senha']!=""){
			$pdo = Conexao::getInstance(); 
			$Email=filter_input(INPUT_POST, 'Email');
			$senha=md5(filter_input(INPUT_POST, 'senha'));
			$sql="SELECT COUNT(*) FROM USUARIO WHERE email = '$Email';";
			$consulta = $pdo->query($sql);
			$count=$consulta->fetch(PDO::FETCH_BOTH);
			if ($count['COUNT(*)']>0) {		
				$sql="SELECT COUNT(*) FROM USUARIO WHERE email = '$Email' and senha='$senha';";
				$consulta = $pdo->query($sql);
				$count=$consulta->fetch(PDO::FETCH_BOTH);
				if ($count['COUNT(*)']>0) {		
					$sql="SELECT * FROM USUARIO WHERE email = '$Email' and senha='$senha';";
					$consulta = $pdo->query($sql);
					$usuario=$consulta->fetch(PDO::FETCH_BOTH);
					$_SESSION['id']=$usuario['0'];
					header('Location: ./principal.php');
				}else{
					$_SESSION['msg']="Não é possivel cadastrar esse usuario, senha incorreta";
					header('Location: ./index.php');
				}
			}else{
				$_SESSION['msg']="Não é possivel entrar com esse usuario, pois o nome não consta na base de dados";
				header('Location: ./index.php');
			}
		}else{
			$_SESSION['msg']="Não foi possivel entrar com o usuário, os campos estão preenchidos de forma incorreta";
			header('Location: ./index.php?option=cadastrar');
		}
	}
?>