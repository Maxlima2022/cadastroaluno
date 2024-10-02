<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação via QR Code</title>
</head>
<body>
    <h1>Autenticação via QR Code</h1>
    <form action="autentica.php" method="POST" enctype="multipart/form-data">
        <label>Selecione o QR Code:</label><input type="file" name="qrcode" required><br>
        <button type="submit">Autenticar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Aqui você implementaria a lógica para decodificar o QR code
        // e buscar as informações no banco de dados.
    }
    ?>
</body>
</html>
