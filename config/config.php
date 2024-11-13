<?php

return [
        'host' => '127.0.0.1',   
        'database' => 'agendamento', //Nome do banco de dados
        'user' => 'root', //Usuário do banco de dados
        'password' => 'root', //Senha do banco de dados
    ];
    $conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão e exibe uma mensagem de erro, caso falhe
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}