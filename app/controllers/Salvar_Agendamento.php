<?php
session_start();
include('../config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Obtém os dados do formulário
$data = $_POST['data'];
$hora = $_POST['hora'];
$descricao = $_POST['descricao'];
$user_id = $_SESSION['user_id'];

// Insere o agendamento no banco de dados
$sql = "INSERT INTO agendamentos (username, data, hora, descricao) VALUES ('$username', '$data', '$hora', '$descricao')";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
} else {
    echo "Erro ao salvar o agendamento: " . $conn->error;
}

$conn->close();
?>