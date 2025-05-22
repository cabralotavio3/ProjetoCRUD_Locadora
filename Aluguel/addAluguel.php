<?php
require_once '../init.php';

$id_usuario = $_POST['id_usuario'];
$data_aluguel = $_POST['data_aluguel'];
$data_devolucao = $_POST['data_devolucao'];
$id_fita = $_POST['id_fita'];

$PDO = db_connect();

$sql = "INSERT INTO Aluguel (data_hora, id_usuario, data_devolucao) 
        VALUES (:data_hora, :id_usuario, :data_devolucao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':data_hora', $data_aluguel);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->bindParam(':data_devolucao', $data_devolucao);

if ($stmt->execute()) {
    $codigo_aluguel = $PDO->lastInsertId();

    $sqlFita = "INSERT INTO Fita_Aluguel (codigo_fita, codigo_aluguel) 
                VALUES (:codigo_fita, :codigo_aluguel)";
    $stmtFita = $PDO->prepare($sqlFita);
    $stmtFita->bindParam(':codigo_fita', $id_fita);
    $stmtFita->bindParam(':codigo_aluguel', $codigo_aluguel);
    $stmtFita->execute();

    header('Location: exibirAluguel.php');
} else {
    echo "Erro ao cadastrar<br>";
    print_r($stmt->errorInfo());
}
?>
