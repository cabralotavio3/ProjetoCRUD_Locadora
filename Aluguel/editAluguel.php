<?php
require '../init.php';

$codigo = isset($_GET['codigo']) ? (int) $_GET['codigo'] : null;

if (!$codigo) {
    header('Location: exibirAluguel.php');
    exit;
}

$PDO = db_connect();

$sql = "SELECT * FROM Aluguel WHERE codigo = :codigo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
$stmt->execute();
$aluguel = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$aluguel) {
    header('Location: exibirAluguel.php');
    exit;
}

$sqlFita = "SELECT codigo_fita FROM Fita_Aluguel WHERE codigo_aluguel = :codigo";
$stmtFita = $PDO->prepare($sqlFita);
$stmtFita->bindParam(':codigo', $codigo, PDO::PARAM_INT);
$stmtFita->execute();
$fita = $stmtFita->fetch(PDO::FETCH_ASSOC);
$codigo_fita = $fita ? $fita['codigo_fita'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Editar Aluguel</title>
</head>
<body>
<div class="container mt-4">
    <h4 class="text-center">Editar Aluguel</h4>
    <form action="atualizarAluguel.php" method="post">
        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">

        <div class="mb-3">
            <label for="data_aluguel" class="form-label">Data:</label>
            <input type="date" name="data_aluguel" id="data_aluguel" class="form-control"
                   value="<?php echo date('Y-m-d', strtotime($aluguel['data_aluguel'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="data_devolucao" class="form-label">Data de Devolução:</label>
            <input type="date" name="data_devolucao" id="data_devolucao" class="form-control"
                   value="<?php echo $aluguel['data_devolucao'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="id_usuario" class="form-label">Usuário:</label>
            <select name="id_usuario" id="id_usuario" class="form-select" required>
                <option value="">Selecione o usuário</option>
                <?php
                $sqlUsuarios = "SELECT id, nome FROM Usuario";
                foreach ($PDO->query($sqlUsuarios) as $usuario) {
                    $selected = $usuario['id'] == $aluguel['id_usuario'] ? 'selected' : '';
                    echo "<option value='{$usuario['id']}' $selected>{$usuario['nome']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_fita" class="form-label">Fita:</label>
            <select name="id_fita" id="id_fita" class="form-select" required>
                <option value="">Selecione a fita</option>
                <?php
                $sqlFitas = "SELECT codigo, titulo FROM Fita";
                foreach ($PDO->query($sqlFitas) as $f) {
                    $selected = $f['codigo'] == $codigo_fita ? 'selected' : '';
                    echo "<option value='{$f['codigo']}' $selected>{$f['titulo']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Atualizar</button>
        </div>
    </form>
</div>
</body>
</html>
