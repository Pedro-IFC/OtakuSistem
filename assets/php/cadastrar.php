<div class="fixed">
	<a class="fechar" href="index.php"><i class="material-icons">clear</i></a>
	<h5 class="color-gold">Cadastro</h5>
	<form method="POST" enctype="multipart/form-data"> 
		<span>Nome:</span>
		<input type="text" name="nome" class="input"><br>
		<span>Data de nascimento</span>
		<input type="date" name="dataNasc" class="input"><br>
		<span>E-mail:</span>
		<input type="email" name="email" class="input"><br>
		<span>Senha:</span>
		<input type="password" name="senha" class="input"><br>
		<span>Repita a senha:</span>
		<input type="password" name="senhaVerif" class="input"><br>
		<span>Foto de perfil:</span>
		<input type="file" name="arquivo"><br><br>
		<button type="submit" name="cadastrar" class="blacktxt btn">Cadastrar <i class="material-icons right">send</i></button>
	</form>
</div>

<?php
	if(isset($_POST['cadastrar'])){
		if($_POST['nome']!="" and $_POST['dataNasc']!="" and $_POST['email']!="" and $_POST['senha']!="" and $_POST['senhaVerif']!=""){
			$pdo = Conexao::getInstance(); 
			$nome=filter_input(INPUT_POST, 'nome');
			$email=filter_input(INPUT_POST, 'email');
			$dataNasc=filter_input(INPUT_POST, 'dataNasc');
			$senha=md5(filter_input(INPUT_POST, 'senha'));
			$senhaVerif=md5(filter_input(INPUT_POST, 'senhaVerif'));
			$sql="SELECT COUNT(*) FROM USUARIO WHERE nome='$nome';";
			$consulta = $pdo->query($sql);
			$count=$consulta->fetch(PDO::FETCH_BOTH);
			if ($count['COUNT(*)']<1) {		
				$sql="SELECT COUNT(*) FROM USUARIO WHERE email='$email';";
				$consulta = $pdo->query($sql);
				$count=$consulta->fetch(PDO::FETCH_BOTH);
				if ($count['COUNT(*)']<1) {		
					if($senha==$senhaVerif){
						$sql="INSERT INTO USUARIO VALUES(DEFAULT, '$nome','$dataNasc','$email','$senha')";
						$consulta = $pdo->query($sql);
						$_SESSION['msg']="Cadastrado com sucesso";
						$sql="SELECT id FROM USUARIO WHERE nome='$nome' and senha ='$senha';";
						$consulta = $pdo->query($sql);
						$id=$consulta->fetch(PDO::FETCH_BOTH);
						$_SESSION['id']=$id['id'];
						if (isset($_FILES['arquivo'])) {
							$permitidos=array('png');
							$extensao=pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
							if(in_array($extensao , $permitidos)){
								$pasta="perfil/";
								$temporario=$_FILES['arquivo']['tmp_name'];
								$novoNome=md5($id['id']).'.'.$extensao;
								if (move_uploaded_file($temporario, $pasta.$novoNome)) {
									header('Location: ./index.php');	
								}
							}else{
								$_SESSION['msg']="Não é possivel cadastrar essa foto de perfil, pois o formato pode ser somente png e jpg";
								header('Location: ./index.php');
							}
						}
						header('Location: ./index.php');
					}else{
						$_SESSION['msg']="Não é possivel cadastrar esse usuario, pois as senhas não correspondem";
						header('Location: ./index.php');
					}
				}else{
					$_SESSION['msg']="Não é possivel cadastrar esse usuario, pois o email já está em uso";
					header('Location: ./index.php');
				}
			}else{
				$_SESSION['msg']="Não é possivel cadastrar esse usuario, pois o nome já está em uso";
				header('Location: ./index.php');
			}
		}else{
			$_SESSION['msg']="Não foi possivel cadastrar usuário, campos preenchidos de forma incorreta";
			header('Location: ./index.php?option=cadastrar');
		}
	}
?>