<?php
require_once '../init.php';

$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : null;

if (empty($codigo)) {
    echo "codigo não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Fita WHERE codigo = :codigo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirSessao.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>
