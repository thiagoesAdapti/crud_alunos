<?php
include 'config.php';

// recebe o id do aluno
$id = $_GET['id'];

// verifica se o método de requisição é POST, se for, recebe os dados do forms
// a senha não vai no formulário e se não inserir nada, não altera 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $valor_mensalidade = $_POST['valor_mensalidade'];
    $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_BCRYPT) : null;
    $situacao = isset($_POST['situacao']) ? 1 : 0;
    $observacao = $_POST['observacao'];

    // salva a consulta de atualização
    $sql = "UPDATE alunos SET 
            nome='$nome', 
            email='$email', 
            telefone='$telefone', 
            valor_mensalidade='$valor_mensalidade', 
            situacao='$situacao', 
            observacao='$observacao'";

    // se a senha foi inserida, ela também entra na atualização
    if ($senha) {
        $sql .= ", senha='$senha'";
    }

    $sql .= " WHERE id=$id";

    // realiza a consulta de atualização e redireciona 
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// consulta os dados do aluno específico e armazena
$sql = "SELECT * FROM alunos WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- formulário para edição -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <a href="index.php" class="btn btn-secondary">Voltar</a>
        <div class="mt-3">
            <h2>Editar Aluno</h2>
            <form method="POST">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?php echo $row['nome']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="<?php echo $row['telefone']; ?>">
                </div>
                <div class="form-group">
                    <label>Valor Mensalidade</label>
                    <input type="number" step="0.01" name="valor_mensalidade" class="form-control" value="<?php echo $row['valor_mensalidade']; ?>">
                </div>
                <div class="form-group">
                    <label>Senha (deixe em branco para não alterar)</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ativo</label>
                    <input type="checkbox" name="situacao" <?php echo $row['situacao'] ? 'checked' : ''; ?>>
                </div>
                <div class="form-group">
                    <label>Observação</label>
                    <textarea name="observacao" class="form-control"><?php echo $row['observacao']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-2">Salvar</button>
            </form>
        </div>
    </div>
</body>

</html>