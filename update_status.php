<?php
include 'config.php';

// recebe o id e o status via GET
$id = $_GET['id'];
$status = $_GET['status'];

// realiza uma consulta pra atualizar a situação
$sql = "UPDATE alunos SET situacao = $status WHERE id = $id";
$conn->query($sql);
