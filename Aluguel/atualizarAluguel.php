<?php
require_once '../init.php';

$codigo = $_POST['codigo'];
$id_usuario = $_POST['id_usuario'];
$data_hora = $_POST['data_hora'];
$data_devolucao = $_POST['data_devolucao'];
$id_fita = $_POST['id_fita'];

$PDO = db_connect();

$sql = "UPDATE Aluguel 
        SET data_hora = :data_hora, id_usuario = :id_usuario, data_devolucao = :data_devolucao 
        WHERE codigo = :codigo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':data_hora', $data_hora);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->bindParam(':data_devolucao', $data_devolucao);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if ($stmt->execute()) {
    $sqlFita = "UPDATE Fita_Aluguel 
                SET codigo_fita = :codigo_fita 
                WHERE codigo_aluguel = :codigo_aluguel";
    $stmtFita = $PDO->prepare($sqlFita);
    $stmtFita->bindParam(':codigo_fita', $id_fita);
    $stmtFita->bindParam(':codigo_aluguel', $codigo);
    $stmtFita->execute();

    header('Location: exibirAluguel.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>
