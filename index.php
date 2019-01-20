<?php
include_once("classe/conexao.class.php");
include_once("classe/acesso.class.php");
include_once("classe/lista.class.php");

session_start();
$auth = new acesso();
$auth->acessoProtegido();
$lista = new lista();
$lista->setTabela("usuarios");




echo $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD OOP MySQLI</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
<a href="sair.php">Sair</a>

<form action="busca.php" method="POST" id="formSearch">
    <input type="text" name="busca" placeholder="Pesquisar...">
    <button>Buscar</button>
</form>

<h1>CRUD - OOP PDO</h1>
<div class="bloco-botao">
    <a href="adicionar.php" class="btn-add">Adicionar</a>
</div>
<table id="tabela">
    <thead>
        <tr>
            <th><strong>ID</strong></th>
            <th><strong>NOME</strong></th>
            <th><strong>E-MAIL</strong></th>
            <th><strong>CPF</strong></th>
            <th><strong>AÇÃO</strong></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($lista->listaDados() as $arr_usuario): ?>
        <tr>
            <td><?= $arr_usuario["id"]; ?></td>
            <td><?= $arr_usuario["nome"]; ?></td>
            <td><?= $arr_usuario["email"]; ?></td>
            <td><?= $arr_usuario["cpf"]; ?></td>
            <td>
                <a href="editar.php?id=<?= $arr_usuario['id']; ?>" class="btn-edit">Editar</a>
                <a href="deletar.php?id=<?= $arr_usuario['id']; ?>" class="btn-del">Deletar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>  
</body>
</html>