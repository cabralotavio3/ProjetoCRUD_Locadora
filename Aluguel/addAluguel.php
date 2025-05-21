<?php
require_once '../init.php';

$titulo = $_POST['titulo'];
$diretor = $_POST['diretor'];
$codigo_sessao = $_POST['codigo_sessao'];

$PDO = db_connect();
$sql = "INSERT INTO Fita (titulo, diretor, codigo_sessao) VALUES (:titulo, :diretor, :codigo_sessao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':diretor', $diretor);
$stmt->bindParam(':codigo_sessao', $codigo_sessao);

if ($stmt->execute()) {
    header('Location: exibirFita.php');
} else {
    echo "Erro ao cadastrar<br>";
    print_r($stmt->errorInfo());
}
?>
