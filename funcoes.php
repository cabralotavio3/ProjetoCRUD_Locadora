<?php
function db_connect() {
    try {
        $PDO = new PDO('mysql:host=localhost;dbname=locadora;charset=utf8', 'alunos', 'cefetmg');
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;
    } catch (PDOException $e) {
        header('Location: ../index.html');
    }
}

function converteData($date) {
    $dataCorrigida = implode('/', array_reverse(explode('-', $date)));
    return $dataCorrigida;
}
?>
