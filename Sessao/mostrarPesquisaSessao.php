<?php
require_once '../init.php';

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$PDO = db_connect();
$sql = "SELECT codigo, descricao FROM Sessao WHERE descricao LIKE :busca ORDER BY descricao ASC";

$stmt = $PDO->prepare($sql);
$param = '%' . $busca . '%';
$stmt->bindParam(':busca', $param);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Pesquisa - Sessão</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h5 class="card-title text-center">Resultado da Pesquisa - Sessão</h5>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['codigo'] ?></td>
                <td><?= $row['descricao'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
