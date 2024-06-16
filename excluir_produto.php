<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja_online";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtém o ID do produto a ser excluído a partir da requisição POST
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

// Prepara e executa a exclusão no banco de dados
$sql = "DELETE FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Produto excluído com sucesso!";
} else {
    echo "Erro ao excluir o produto: " . $conn->error;
}

$stmt->close();
$conn->close();
?>