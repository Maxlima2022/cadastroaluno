<?php
$servername = "localhost"; // Endereço do servidor
$username = "root"; // Usuário padrão do XAMPP
$password = ""; // Senha em branco
$dbname = "alunos"; // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
