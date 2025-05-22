<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluguel</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h5 class="card-title text-center">Cadastro de Aluguel</h5>
    <form action="addAluguel.php" method="post" class="mt-4">
        
        <div class="mb-3">
            <label for="id_usuario" class="form-label">Usuário:</label>
            <select name="id_usuario" id="id_usuario" class="form-select" required>
                <option value="">Selecione um usuário</option>
                <?php
                require_once '../init.php';
                $PDO = db_connect();
                $sql = "SELECT id, nome FROM Usuario";
                foreach ($PDO->query($sql) as $row) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_fita" class="form-label">Fita:</label>
            <select name="id_fita" id="id_fita" class="form-select" required>
                <option value="">Selecione uma fita</option>
                <?php
                $sql = "SELECT codigo, titulo FROM Fita";
                foreach ($PDO->query($sql) as $row) {
                    echo "<option value='{$row['codigo']}'>{$row['titulo']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_sessao" class="form-label">Sessão:</label>
            <select name="id_sessao" id="id_sessao" class="form-select" required>
                <option value="">Selecione uma sessão</option>
                <?php
                $sql = "SELECT codigo, descricao FROM Sessao";
                foreach ($PDO->query($sql) as $row) {
                    echo "<option value='{$row['codigo']}'>{$row['descricao']}</option>";
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
            <input type="date" name="data_devolucao" id="data_devolucao" class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary">
    </form>
</div>
</body>
</html>
