<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos - Halloween</title>
    <style>
        body {
            background-image: url('2835179.jpg'); /* Substitua pelo link da imagem de fundo */
            background-size: cover; /* Faz a imagem de fundo cobrir toda a tela */
            background-position: center; /* Centraliza a imagem de fundo */
            color: #f0a500; /* Laranja brilhante */
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 20px; /* Ajuste de padding para dispositivos móveis */
            height: 100vh; /* Altura total da tela */
            margin: 0; /* Remove margens padrão */
        }
        h1 {
            font-size: 2.5em;
            text-shadow: 2px 2px 5px #000; /* Sombra do texto */
        }
        form {
            background-color: #333; /* Fundo mais escuro para o formulário */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            max-width: 400px; /* Largura máxima do formulário */
            margin: auto; /* Centraliza o formulário */
            text-align: left; /* Alinha o texto à esquerda */
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 1.2em;
        }
        input[type="text"], input[type="email"], input[type="submit"] {
            width: calc(100% - 22px); /* Ajusta a largura para incluir o padding */
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1em;
            box-sizing: border-box; /* Inclui padding e border na largura total */
        }
        input[type="submit"] {
            background-color: #f0a500; /* Laranja brilhante para o botão */
            color: #2c2c2c; /* Texto escuro no botão */
            cursor: pointer;
            font-weight: bold; /* Negrito para o texto do botão */
        }
        input[type="submit"]:hover {
            background-color: #d68a00; /* Laranja mais escuro no hover */
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #ccc; /* Cor do texto da parte inferior */
        }
        .halloween-decor {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 100px; /* Tamanho da imagem */
            height: auto;
        }

        /* Estilos Responsivos */
        @media (max-width: 600px) {
            h1 {
                font-size: 2em; /* Tamanho do texto do cabeçalho em telas menores */
            }
            form {
                padding: 15px; /* Ajusta o padding do formulário em telas menores */
            }
            label {
                font-size: 1em; /* Tamanho do texto do label em telas menores */
            }
            input[type="text"], input[type="email"], input[type="submit"] {
                font-size: 0.9em; /* Tamanho do texto dos campos de entrada em telas menores */
            }
        }
    </style>
</head>
<body>
    <img src="conjunto-de-vetores-de-halloween.png" alt="Decoração de Halloween" class="halloween-decor"> <!-- Substitua pelo link de uma imagem de Halloween -->
    <h1>Cadastro de Alunos</h1>
    <form action="processa_cadastro.php" method="POST">
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" required>

        <label for="turma">Turma:</label>
        <input type="text" id="turma" name="turma" required>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required>

        <label for="periodo">Período:</label>
        <input type="text" id="periodo" name="periodo" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Cadastrar e Gerar QR Code">
    </form>
    <div class="footer">
        &copy; 2024 - Sistema de Cadastro de Alunos
    </div>
</body>
</html>
