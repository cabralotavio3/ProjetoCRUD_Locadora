<?php
require_once 'init.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];

$PDO = db_connect();
$sql = "INSERT INTO Usuario (nome, email, endereco, telefone) VALUES (:nome, :email, :endereco, :telefone)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':telefone', $telefone);

if ($stmt->execute()) {
    header('Location: exibir.php');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>
