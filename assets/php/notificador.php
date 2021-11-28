<?php 
	if (isset($_SESSION['msg'])) {
		?>
			<script type="text/javascript">
				alert("<?php echo $_SESSION['msg']; ?>");
			</script>
		<?php
		if ($_SESSION['msg']=="Cadastrado com sucesso") {
			?>
			<script type="text/javascript">
				const audio = new Audio('./assets/audios/BemVindoOnichan.ogg');
				audio.play();
			</script>
		<?php
		}
		unset($_SESSION['msg']);
	}
?>