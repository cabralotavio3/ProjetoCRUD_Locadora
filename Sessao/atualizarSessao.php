<?php
require_once '../init.php';

$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];
$localizacao = $_POST['localizacao'];

$PDO = db_connect();
$sql = "UPDATE Sessao SET descricao = :descricao, localizacao = :localizacao WHERE codigo = :codigo";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':localizacao', $localizacao);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirSessao.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>
