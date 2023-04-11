<?php
// Conexão com o banco de dados
$conn = mysqli_connect("localhost:3306", "root", "", "teste-lqdi");

// Verificação de erros na conexão
if (mysqli_connect_errno()) {
  die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Consulta SQL para buscar as inscrições
$sql = "SELECT id, nome, email FROM inscricoes";
$result = mysqli_query($conn, $sql);

// Verificação de erros na consulta
if (!$result) {
  die("Erro na consulta ao banco de dados: " . mysqli_error($conn));
}

// Array para armazenar as inscrições
$inscricoes = array();

// Loop através dos resultados da consulta
while ($row = mysqli_fetch_assoc($result)) {
  $inscricoes[] = array(
    'id' => $row['id'],
    'nome' => $row['nome'],
    'email' => $row['email']
  );
}

// Fechamento da conexão com o banco de dados
mysqli_close($conn);

// Conversão do array de inscrições para JSON
$json = json_encode($inscricoes, JSON_PRETTY_PRINT);

// Configuração do cabeçalho da resposta HTTP
header('Content-Type: application/json');

// Saída do resultado em formato JSON
echo $json;
?>
