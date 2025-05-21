<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Cadastrar Fita</title>
</head>
<body>
    <div class="container mt-4">
        <h5 class="card-title text-center">Cadastro de Fita</h5>
        <form action="addFita.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="diretor" class="form-label">Diretor:</label>
                <input type="text" name="diretor" id="diretor" class="form-control" required>
            </div>
            <div class="mb-3">
    <label for="codigo_sessao" class="form-label">Sessão:</label>
    <select name="codigo_sessao" id="codigo_sessao" class="form-select" required>
        <option value="">Selecione uma sessão</option>
        <?php
        require_once '../init.php';
        $PDO = db_connect();
        $sql = "SELECT codigo, descricao FROM Sessao"; // <- Correção aqui
        foreach ($PDO->query($sql) as $row) {
            echo "<option value='{$row['codigo']}'>{$row['descricao']}</option>";
        }
        ?>
    </select>
</div>


            <input type="submit" value="Salvar" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
