<?php
require_once '../init.php';

$titulo = $_POST['titulo'];
$diretor = $_POST['diretor'];

$PDO = db_connect();
$sql = "INSERT INTO Fita (titulo, diretor) VALUES (:titulo, :diretor)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':diretor', $diretor);

if ($stmt->execute()) {
    header('Location: exibirSessao.php');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>
