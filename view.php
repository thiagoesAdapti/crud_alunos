<?php
include 'config.php';

// recebe o id do aluno
$id = $_GET['id'];

// realiza uma consulta pra buscar os detalhes do aluno 
$sql = "SELECT * FROM alunos WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- página com os detalhes do aluno -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ver Aluno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Detalhes do Aluno</h2>
        <div class="form-group">
            <label class="bg-light p-2 d-block font-weight-bold">ID</label>
            <p class="p-2 border-right border-bottom border-left"><?php echo $row['id']; ?></p>
        </div>
        <div class="form-group">
            <label class="bg-light p-2 d-block font-weight-bold">Nome</label>
            <p class="p-2 border-right border-bottom border-left"><?php echo $row['nome']; ?></p>
        </div>
        <div class="form-group">
            <label class="bg-light p-2 d-block font-weight-bold">Email</label>
            <p class="p-2 border-right border-bottom border-left"><?php echo $row['email']; ?></p>
        </div>
        <div class="form-group">
            <label class="bg-light p-2 d-block font-weight-bold">Telefone</label>
            <p class="p-2 border-right border-bottom border-left"><?php echo $row['telefone']; ?></p>
        </div>
        <div class="form-group">
            <label class="bg-light p-2 d-block font-weight-bold">Valor da Mensalidade</label>
            <p class="p-2 border-right border-bottom border-left"><?php echo 'R$ ' . $row['valor_mensalidade']; ?></p>
        </div>
        <div class="form-group">
            <label class="bg-light p-2 d-block font-weight-bold">Situação</label>
            <p class="p-2 border-right border-bottom border-left"><?php echo $row['situacao'] ? 'Ativo' : 'Inativo'; ?></p>
        </div>
        <div class="form-group">
            <label class="bg-light p-2 d-block font-weight-bold">Observação</label>
            <p class="p-2 border-right border-bottom border-left"><?php echo $row['observacao']; ?></p>
        </div>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
</body>

</html>