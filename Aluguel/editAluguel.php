<?php
require '../init.php';

$codigo = isset($_GET['codigo']) ? (int) $_GET['codigo'] : null;

if (!$codigo) {
    header('Location: exibirFita.php');
    exit;
}

$PDO = db_connect();
$sql = "SELECT titulo, diretor FROM Fita WHERE codigo = :codigo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: exibirFita.php');
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
        <p class="h4">Cadastro de Fita</p>
    </div>
    <form action="atualizarFita.php" method="post">
        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="titulo">Descrição:</label>
                    <input type="text" class="form-control" name="titulo" value="<?php echo $user['titulo'] ?>" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="diretor">diretor:</label>
                    <input type="diretor" class="form-control" name="diretor" value="<?php echo $user['diretor'] ?>" required>
                </div>
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
