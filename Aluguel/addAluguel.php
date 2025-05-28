<?php
require_once '../init.php';

if (
    !($_POST['id_usuario']) ||
    !($_POST['id_fita']) ||
    !($_POST['data_aluguel']) ||
    !($_POST['data_devolucao'])
) {
    echo "Erro: Dados incompletos.";
    exit;
}

$id_usuario = $_POST['id_usuario'];
$id_fita = $_POST['id_fita'];
$data_aluguel = $_POST['data_aluguel'];
$data_devolucao = $_POST['data_devolucao'];

$PDO = db_connect();

$sql = "INSERT INTO Aluguel (id_usuario, data_aluguel, data_devolucao)
        VALUES (:id_usuario, :data_aluguel, :data_devolucao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->bindParam(':data_aluguel', $data_aluguel);
$stmt->bindParam(':data_devolucao', $data_devolucao);

if ($stmt->execute()) {
    $codigo_aluguel = $PDO->lastInsertId();

    $sqlFita = "INSERT INTO Fita_Aluguel (codigo_aluguel, codigo_fita)
                VALUES (:codigo_aluguel, :codigo_fita)";
    $stmtFita = $PDO->prepare($sqlFita);
    $stmtFita->bindParam(':codigo_aluguel', $codigo_aluguel);
    $stmtFita->bindParam(':codigo_fita', $id_fita);
    $stmtFita->execute();
    if ($stmt->execute()) {
        header('Location: exibirAluguel.php');
} else {
    echo "Erro ao cadastrar aluguel.<br>";
    print_r($stmt->errorInfo());
}
