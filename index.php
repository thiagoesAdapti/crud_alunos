<?php
include 'config.php';

// busca todos os registros da tabela alunos
$sql = "SELECT * FROM alunos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<!-- lista dos alunos -->

<head>
    <meta charset="UTF-8">
    <title>CRUD Alunos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Lista de Alunos</h2>
        <a href="create.php" class="btn btn-success mb-2">Cadastrar Aluno</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Valor da Mensalidade</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['telefone']; ?></td>
                        <td><?php echo 'R$ ' . $row['valor_mensalidade']; ?></td>
                        <td>
                            <input type="checkbox" onclick="updateStatus(<?php echo $row['id']; ?>, this)" <?php echo $row['situacao'] ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-sm">Ver</a>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- script para atualizar a situação. Envia uma requisição GET para update_status com o id do aluno e o novo status -->
    <script>
        function updateStatus(id, checkbox) {
            var status = checkbox.checked ? 1 : 0;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "update_status.php?id=" + id + "&status=" + status, true);
            xhr.send();
        }
    </script>
</body>

</html>