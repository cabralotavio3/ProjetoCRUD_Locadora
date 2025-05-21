<?php
require_once '../init.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];

$PDO = db_connect();
$sql = "UPDATE Usuario SET nome = :nome, email = :email, endereco = :endereco, telefone = :telefone WHERE id = :id";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirUsuarios.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>
