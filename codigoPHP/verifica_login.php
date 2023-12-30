<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="icon" href="img/calendar4-week.svg">
	<script src="js/funcao.js"></script>
</head>

<body>
	<?php
	// fazer a conexao com o banco de dados
	include_once('conexao.php');
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	if (!empty($_POST) && (empty($email) || empty($senha))) {
		echo "<script>loginMensagem();</script>";
	} else {

		// as variáveis email e senha recebem os dados digitados na página anterior
		$email_escape = addslashes($email);
		$senha_escape = addslashes($senha);

		// fazer uma consulta no bd, na tabela usuarios
		$query = "SELECT * 
				FROM usuario
				WHERE email = '{$email_escape}' LIMIT 1";
		$sql = mysqli_query($conn, $query); //Leva o camando sql para o BD
		$nivel = mysqli_fetch_assoc($sql); //Executa o sql e traz o resultado
	
		if (mysqli_affected_rows($conn) > 0) { //verifica se tem o usuario no bd
	
			session_start(); //inicializa a session
	
			/* VERIFICA SENHA CRIPTOGRAFADA */
			if (password_verify($senha_escape, $nivel['senha'])) {

				if ($nivel['ativo'] == 1) {
					$_SESSION['id'] = $nivel['idusuario'];
					$_SESSION['nome'] = $nivel['nome'];
					$_SESSION['email'] = $nivel['email'];
					$_SESSION['senha'] = $nivel['senha'];
					$_SESSION['telefone'] = $nivel['telefone'];
					$_SESSION['tipo_acesso'] = $nivel['tipo_acesso'];
					$_SESSION["sessiontime"] = time() + 60 * 30;
					if ($_SESSION['tipo_acesso'] == "Usuario") {
						header("Location: index.php");
					} else {
						header("location: home.php");
					}
				} else {
					echo "<script>OpcaoMensagens(50);</script>";
					session_destroy();
					unset($_SESSION['id']);
					unset($_SESSION['nome']);
					unset($_SESSION['email']);
					unset($_SESSION['senha']);
					unset($_SESSION['telefone']);
					unset($_SESSION['tipo_acesso']);
					echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=sair.php">';
				}

			} else {
				session_destroy();
				unset($_SESSION['id']);
				unset($_SESSION['nome']);
				unset($_SESSION['email']);
				unset($_SESSION['senha']);
				unset($_SESSION['telefone']);
				unset($_SESSION['tipo_acesso']);
				echo "<script>loginMensagem();</script>";
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=sair.php">';
			}

		} else {
			echo "<script>loginMensagem();</script>";
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=sair.php">';
		}
	}
	?>
</body>

</html>