<?php
include 'config.php';

// recebe o id do aluno
$id = $_GET['id'];

// salva a consulta de exclusão
$sql = "DELETE FROM alunos WHERE id = $id";

// realiza a consulta de exclusão e redireciona
if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit();
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
