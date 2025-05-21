<?php
require_once '../init.php';

$PDO = db_connect();
$sql = "SELECT id, nome, email, endereco, telefone FROM Usuario ORDER BY nome ASC";
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
      $(function () {
        $("#menu").load("../navbar/navbar.html");
      });
    });
  </script>
    <title>Exibir Usuários</title>
</head>
<body>
<h1>Menu de Dados</h1>

<div>
  <div class="container">
    <div id="menu">
    </div>
  </div>

</div>
    <div class="container">
        <h5 class="card-title" style="text-align:center">Usuários Cadastrados</h5>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['nome'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['endereco'] ?></td>
                    <td><?= $user['telefone'] ?></td>
                    <td>
                        <a href="editUsuario.php?id=<?= $user['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="deleteUsuario.php?id=<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza de que deseja remover?')">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
