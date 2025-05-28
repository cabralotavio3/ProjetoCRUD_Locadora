<?php
require_once '../init.php';

$PDO = db_connect();
$sql = "SELECT 
            A.codigo, 
            U.nome AS nome_usuario,
            F.titulo AS nome_fita,
            A.data_hora,
            A.data_devolucao
        FROM Aluguel A
        LEFT JOIN Usuario U ON A.id_usuario = U.id
        LEFT JOIN Fita_Aluguel FA ON A.codigo = FA.codigo_aluguel
        LEFT JOIN Fita F ON FA.codigo_fita = F.codigo
        ORDER BY A.codigo DESC";
$stmt = $PDO->prepare($sql);
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
<div class="container">
    <div id="menu"></div>

    <div class="mt-4">
        <h5 class="card-title text-center">Aluguéis Cadastrados</h5>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Usuário</th>
                    <th>Fita</th>
                    <th>Data Aluguel</th>
                    <th>Data Devolução</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($aluguel = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $aluguel['codigo'] ?></td>
                    <td><?= $aluguel['nome_usuario'] ?? 'N/A' ?></td>
                    <td><?= $aluguel['nome_fita'] ?? 'N/A' ?></td>
                    <td><?= $aluguel['data_hora'] ?></td>
                    <td><?= $aluguel['data_devolucao'] ?></td>
                    <td>
                        <a href="editAluguel.php?codigo=<?= $aluguel['codigo'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deleteAluguel.php?codigo=<?= $aluguel['codigo'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza de que deseja remover?')">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
