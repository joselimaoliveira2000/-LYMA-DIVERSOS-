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

// Consulta para buscar todos os produtos
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

$produtos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

// Retorna os produtos em formato JSON
echo json_encode($produtos);

$conn->close();
?>