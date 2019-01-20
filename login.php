<?php 
    include_once("classe/conexao.class.php");
    include_once("classe/acesso.class.php");
    //include_once("classe/lista.class.php");

    if($_POST && $_GET["acao"] == "acessar"):
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);


        //$conectar = new conexaoPDO();
        $auth = new acesso();
        $auth->setTabela("usuarios");

        if($auth->setAcesso($email, $senha) == 1):
            header("Location: index.php");
        else:
            header("Location: login.php?acao=error");
        endif;
        

    endif;
    
    if(@$_GET["acao"] == "error"):
        echo "<div class='msg-error'>Dados incorreto!</div>";
    endif;
    /*$conectar = new conexaoPDO();
    $conectar->conectar();
    echo $conectar->getMsg();
    echo "<br>----------------<br>";

    $lista = new lista();
    $lista->setTabela("usuarios");
    foreach($lista->listaDados() as $arr_usuario):
        echo $arr_usuario["email"]." ".$arr_usuario["nome"]."<br>";
    endforeach;
    
    exit();*/




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Acesso ao CRUD OOP PDO - Login</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<h1>CRUD - PDO</h1>
	<form action="login.php?acao=acessar" method="POST" id="formLogin">
		<label for="email">
			<strong>E-Mail</strong>
			<input type="text" name="email" placeholder="E-Mail" required>
		</label>
		<label for="senha">
			<strong>Senha</strong>
			<input type="password" name="senha" placeholder="Senha" required>
		</label>	
		<button type="submit" class="btn-go">Entrar</button>
	</form>
	<div class="bloco-botao">
		<a href="esqueceu-senha.php">Esqueceu a senha?</a>
	</div>
</body>
</html>