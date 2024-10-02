<?php
// processa_cadastro.php

// Inclua a biblioteca para gerar QR Code
require 'vendor/autoload.php'; // Ajuste o caminho conforme necessário

use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Conexão com o banco de dados
$servername = "localhost"; // Nome do servidor
$username = "seu_usuario"; // Nome do usuário
$password = "sua_senha"; // Sua senha
$dbname = "seu_banco"; // Nome do banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação de conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Captura os dados do formulário
$nome_completo = $_POST['nome_completo'];
$turma = $_POST['turma'];
$curso = $_POST['curso'];
$periodo = $_POST['periodo'];
$email = $_POST['email'];

// Insere os dados no banco de dados
$sql = "INSERT INTO alunos (nome_completo, turma, curso, periodo, email) VALUES ('$nome_completo', '$turma', '$curso', '$periodo', '$email')";

if ($conn->query($sql) === TRUE) {
    // Gera o QR Code
    $qrData = "Nome: $nome_completo\nTurma: $turma\nCurso: $curso\nPeríodo: $periodo\nE-mail: $email";
    $qrCode = new QrCode($qrData);
    $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
    $qrCode->setSize(300);
    $qrCode->setMargin(10);

    // Salva o QR Code em um arquivo
    $qrCodeFileName = 'qrcodes/' . uniqid() . '.png';
    $qrCode->writeFile($qrCodeFileName);

    // Envia o e-mail com o QR Code
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'smtp.seudominio.com'; // Defina seu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'seu_email@seudominio.com'; // Seu e-mail
        $mail->Password = 'sua_senha'; // Sua senha
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('seu_email@seudominio.com', 'Sistema de Cadastro');
        $mail->addAddress($email); // Adiciona o e-mail do aluno

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Seu QR Code de Cadastro';
        $mail->Body    = "Olá, $nome_completo!<br><br>Seu cadastro foi realizado com sucesso. Veja seu QR Code em anexo.";
        $mail->addAttachment($qrCodeFileName); // Anexa o QR Code

        $mail->send();
        echo 'Cadastro realizado com sucesso e QR Code enviado para o e-mail.';
    } catch (Exception $e) {
        echo "Ocorreu um erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
