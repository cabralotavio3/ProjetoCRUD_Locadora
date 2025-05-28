<?php
require_once '../init.php';

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$PDO = db_connect();
$sql = "SELECT id, nome, email FROM Usuario WHERE nome LIKE :busca ORDER BY nome ASC";

$stmt = $PDO->prepare($sql);
$param = '%' . $busca . '%';
$stmt->bindParam(':busca', $param);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Pesquisa - Usuário</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript">
        $(document).ready(function () {
            $("#menu").load("../navbar/navbar.html");
        });
    </script>
</head>
<body>
<div class="container mt-4">
    <h5 class="card-title text-center">Resultado da Pesquisa - Usuário</h5>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['email'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
