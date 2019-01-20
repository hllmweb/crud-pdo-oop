<?php
include_once("classe/conexao.class.php");
include_once("classe/acesso.class.php");
include_once("classe/lista.class.php");
include_once("classe/edita.class.php");

session_start();
$auth = new acesso();
$auth->acessoProtegido();

@$id_usuario = (int) $_GET["id"];

$lista = new lista();
$lista->setTabela("usuarios");
$lista->setCampo("id");
$lista->setValor($id_usuario);

$arr_usuario = $lista->listaDado();

$nome       = $arr_usuario["nome"];
$email      = $arr_usuario["email"];
$senha      = $arr_usuario["senha"];
$telefone   = $arr_usuario["telefone"];
$cpf        = $arr_usuario["cpf"];
$endereco   = $arr_usuario["endereco"];

if(@$_GET["acao"] == "editar"):
    $nome 		= utf8_decode($_POST["nome"]);
    $email 		= $_POST["email"];
    @$senha 	= ($_POST["senha"] != $senha) ? md5($_POST["senha"]) : $_POST["senha"];
    $telefone 	= $_POST["telefone"];
    $cpf 		= $_POST["cpf"];
    $endereco   = $_POST["endereco"];

    $edit = new edita();
    $edit->setTabela("usuarios");
    $edit->setCampo("nome='$nome',email='$email',senha='$senha',telefone='$telefone',cpf='$cpf',endereco='$endereco'");
    $edit->setValor($id_usuario);

    if($edit->editarDados() == 1):
        echo "<div class='msg-sucesso'>Usuário atualizado com sucesso! <a href='index.php' class='btn-back'>VOLTAR</a></div>";
    endif;
endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD - Editar</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<h1>CRUD - Editar</h1>
	<form action="editar.php?acao=editar&id=<?= $id_usuario; ?>" method="POST" id="formAdd">
		<label for="nome">
			<strong>Nome</strong>
			<input type="text" name="nome" value="<?= $nome; ?>" required>
		</label>
		<label for="email">
			<strong>E-Mail</strong>
			<input type="text" name="email" value="<?= $email; ?>" required>
		</label>
		<label for="senha">
			<strong>Senha</strong>
			<input type="password" name="senha" value="<?= $senha; ?>" required>
		</label>
		<label for="telefone">
			<strong>Telefone</strong>
			<input type="text" name="telefone" value="<?= $telefone; ?>" required>
		</label>
		<label for="cpf">
			<strong>CPF</strong>
			<input type="text" name="cpf" value="<?= $cpf; ?>" required>
		</label>
		<label for="endereco">
			<strong>Endereço</strong>
			<input type="text" name="endereco" value="<?= $endereco; ?>" required>
		</label>
		<div class="bloco-botao">
			<button type="submit" class="btn-add">Enviar</button>
		</div>
	</form>	
</body>
</html>