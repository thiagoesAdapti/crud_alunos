<?php
include 'config.php';

// verificar se o método de requisição é POST, caso seja, recebe os dados do forms
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $valor_mensalidade = $_POST['valor_mensalidade'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    $situacao = isset($_POST['situacao']) ? 1 : 0;
    $observacao = $_POST['observacao'];

    // salva a consulta de inserção
    $sql = "INSERT INTO alunos (nome, email, telefone, valor_mensalidade, senha, situacao, observacao) VALUES ('$nome', '$email', '$telefone', '$valor_mensalidade', '$senha', '$situacao', '$observacao')";

    // realiza a consulta de inserção e redireciona
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- formulário para cadastro -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Cadastrar Aluno</h2>
        <form method="POST">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control">
            </div>
            <div class="form-group">
                <label>Valor Mensalidade</label>
                <input type="number" step="0.01" name="valor_mensalidade" class="form-control">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Ativo</label>
                <input type="checkbox" name="situacao">
            </div>
            <div class="form-group">
                <label>Observação</label>
                <textarea name="observacao" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</body>

</html>