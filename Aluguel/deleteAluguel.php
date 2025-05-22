<?php
require_once '../init.php';

$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : null;

if (empty($codigo)) {
    echo "codigo não informado";
    exit;
}

$PDO = db_connect();

$sql1 = "DELETE FROM Fita_Aluguel WHERE codigo_aluguel = :codigo";
$stmt1 = $PDO->prepare($sql1);
$stmt1->bindParam(':codigo', $codigo, PDO::PARAM_INT);
$stmt1->execute();

$sql2 = "DELETE FROM Aluguel WHERE codigo = :codigo";
$stmt2 = $PDO->prepare($sql2);
$stmt2->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if ($stmt2->execute()) {
    header('Location: exibirAluguel.php');
} else {
    echo "Erro ao remover";
    print_r($stmt2->errorInfo());
}
?>
