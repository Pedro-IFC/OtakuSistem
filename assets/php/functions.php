<?php
	function allFromUser($id){
		$pdo = Conexao::getInstance(); 
		$sql="SELECT * FROM usuario WHERE id='$id'";
		$consulta= $pdo->query($sql);
		return $consulta->fetch(PDO::FETCH_BOTH);
	}
	function ImagemDePerfilUrl($id){
		return "perfil/".md5($id).".png";
	}
	function Idade($dataNasc){
		$dif=strtotime(date('Y/m/d'))-strtotime($dataNasc);
		return floor($dif/(60*60*24*365));
	}
?>