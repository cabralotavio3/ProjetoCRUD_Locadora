<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Aluguel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h5 class="card-title text-center">Adicionar Novo Aluguel</h5>
        <form action="formAddAluguel.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="id_usuario" class="form-label">Usuário:</label>
                <select name="id_usuario" id="id_usuario" class="form-select" required>
                    <?php
                    require_once '../init.php';
                    $PDO = db_connect();
                    $stmt = $PDO->query("SELECT id, nome FROM Usuario");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_fita" class="form-label">Fita:</label>
                <select name="id_fita" id="id_fita" class="form-select" required>
                    <?php
                    $stmt = $PDO->query("SELECT codigo, titulo FROM Fita");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['codigo']}'>{$row['titulo']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_aluguel" class="form-label">Data do Aluguel:</label>
                <input type="date" name="data_aluguel" id="data_aluguel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="data_devolucao" class="form-label">Data da Devolução:</label>
                <input type="date" name="data_devolucao" id="data_devolucao" class="form-control" required>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
