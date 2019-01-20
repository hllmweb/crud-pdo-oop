<?php
include_once("classe/conexao.class.php");
include_once("classe/acesso.class.php");
include_once("classe/deleta.class.php");

session_start();
$auth = new acesso();
$auth->acessoProtegido();

@$id_deletar = (int) $_GET["id"];

if(@$_GET["acao"] == "deletar"):
    $del = new deleta();
    $del->setTabela("usuarios");
    $del->setCampo("id");
    $del->setValor($id_deletar);

    if($del->deletarDados() == 1):
        echo "<div style='width: 800px; background-color: green; display: block; padding: 20px; color: #FFF; font-weight: bold; margin:20px auto; border-radius: 6px; font-family:Arial, sans-serif;'>Usuário deletado com sucesso! <a href='index.php' style='text-decoration:none; background-color:#fff; color:#ccc; padding:5px; border-radius:6px; margin-left:10px;'>VOLTAR</a></div>";
        exit();
    endif;

endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD - Deletar</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<h1>CRUD - Deletar</h1>
	<h2>Você deseja realmente deletar esse usuário ?</h2>
	<div class="bloco-botao">
		<a href="deletar.php?acao=deletar&id=<?= $id_deletar; ?>" class="btn-del">Sim</a>
		<a href="index.php" class="btn-add">Não</a>
	</div>	
</body>
</html>