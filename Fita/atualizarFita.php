<?php
require_once '../init.php';

$codigo = $_POST['codigo'];
$titulo = $_POST['titulo'];
$diretor = $_POST['diretor'];

$PDO = db_connect();
$sql = "UPDATE Fita SET titulo = :titulo, diretor = :diretor WHERE codigo = :codigo";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':diretor', $diretor);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirSessao.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>
