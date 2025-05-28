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
    <title>Resultado da Pesquisa - Sessão</title>
</head>
<body>
<div id="menu"></div>

<div class="container mt-4">
    <h5 class="card-title text-center">Resultado da Pesquisa: "<?php echo htmlspecialchars($busca); ?>"</h5>

    <table class="table table-bordered table-hover mt-4">
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

    <div class="text-center">
        <a href="pesquisarSessao.html" class="btn btn-secondary">Nova Pesquisa</a>
    </div>
</div>
</body>
</html>
