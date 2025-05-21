<?php
require '../init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (!$id) {
    header('Location: exibirUsuarios.php');
    exit;
}

$PDO = db_connect();
$sql = "SELECT nome, email, endereco, telefone FROM Usuario WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: exibirUsuarios.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>CRUD PDO</title>
</head>
<body>
<div class="container">
    <div class="jumbotron text-center">
        <p class="h4">Cadastro de Usuários</p>
    </div>
    <form action="atualizarUsuario.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $user['nome'] ?>" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $user['email'] ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" value="<?php echo $user['endereco'] ?>" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" value="<?php echo $user['telefone'] ?>" required>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</div>
</body>
</html>
