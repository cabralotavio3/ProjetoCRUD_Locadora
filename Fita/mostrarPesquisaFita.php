<?php
require_once '../init.php';

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$PDO = db_connect();
$sql = "SELECT codigo, titulo, diretor 
        FROM Fita 
        WHERE titulo LIKE :busca OR diretor LIKE :busca 
        ORDER BY titulo ASC";

$stmt = $PDO->prepare($sql);
$param = '%' . $busca . '%';
$stmt->bindParam(':busca', $param);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#menu").load("../navbar/navbar.html");
        });
    </script>
    <title>Exibir Aluguel</title>
</head>
<body>
<div class="container mt-4">
    <h5 class="card-title text-center">Resultado da Pesquisa - Fita</h5>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Diretor</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['codigo'] ?></td>
                <td><?= $row['titulo'] ?></td>
                <td><?= $row['diretor'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
