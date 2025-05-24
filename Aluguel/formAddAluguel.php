<?php
require_once '../init.php';

$id_usuario = $_POST['id_usuario'];
$id_fita = $_POST['id_fita'];
$id_sessao = $_POST['id_sessao'];
$data_aluguel = $_POST['data_aluguel'];
$data_devolucao = $_POST['data_devolucao'];

$PDO = db_connect();

$sql = "INSERT INTO Aluguel (id_usuario, id_sessao, data_aluguel, data_devolucao) 
        VALUES (:id_usuario, :id_sessao, :data_aluguel, :data_devolucao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->bindParam(':id_sessao', $id_sessao);
$stmt->bindParam(':data_aluguel', $data_aluguel);
$stmt->bindParam(':data_devolucao', $data_devolucao);

if ($stmt->execute()) {
    $codigo_aluguel = $PDO->lastInsertId();

    $sql_fita = "INSERT INTO Fita_Aluguel (codigo_aluguel, codigo_fita) 
                 VALUES (:codigo_aluguel, :codigo_fita)";
    $stmt_fita = $PDO->prepare($sql_fita);
    $stmt_fita->bindParam(':codigo_aluguel', $codigo_aluguel);
    $stmt_fita->bindParam(':codigo_fita', $id_fita);
    $stmt_fita->execute();

    header('Location: exibirAluguel.php');
} else {
    echo "Erro ao cadastrar<br>";
    print_r($stmt->errorInfo());
}
?>
