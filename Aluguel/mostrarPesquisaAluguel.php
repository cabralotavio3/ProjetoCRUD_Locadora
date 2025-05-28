<?php
require_once '../init.php';

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$PDO = db_connect();
$sql = "
SELECT 
    Aluguel.codigo,
    Usuario.nome AS usuario,
    Fita.titulo AS fita,
    Sessao.descricao AS sessao,
    Aluguel.data_aluguel,
    Aluguel.data_devolucao
FROM Aluguel
JOIN Usuario ON Aluguel.id_usuario = Usuario.id
JOIN Fita_Aluguel ON Aluguel.codigo = Fita_Aluguel.codigo_aluguel
JOIN Fita ON Fita_Aluguel.codigo_fita = Fita.codigo
JOIN Sessao ON Fita.codigo_sessao = Sessao.codigo
WHERE 
    Usuario.nome LIKE :busca OR
    Fita.titulo LIKE :busca OR
    Sessao.descricao LIKE :busca OR
    Aluguel.data_aluguel LIKE :busca
ORDER BY Aluguel.codigo DESC
";

$stmt = $PDO->prepare($sql);
$busca_param = "%" . $busca . "%";
$stmt->bindParam(':busca', $busca_param);
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
<div id="menu"></div>
<div class="container mt-4">
    <h5 class="card-title text-center">Resultado da Pesquisa: "<?php echo htmlspecialchars($busca); ?>"</h5>
    <table class="table table-bordered table-hover mt-4">
        <thead>
            <tr>
                <th>Código</th>
                <th>Usuário</th>
                <th>Fita</th>
                <th>Sessão</th>
                <th>Data Aluguel</th>
                <th>Data Devolução</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= ($row['codigo']) ?></td>
                    <td><?= ($row['usuario']) ?></td>
                    <td><?= ($row['fita']) ?></td>
                    <td><?= ($row['sessao']) ?></td>
                    <td><?= ($row['data_aluguel']) ?></td>
                    <td><?= ($row['data_devolucao']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div class="text-center">
        <a href="pesquisarAluguel.html" class="btn btn-secondary">Nova Pesquisa</a>
    </div>
</div>
</body>
</html>
