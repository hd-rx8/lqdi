<?php
// Conecta ao banco de dados
  $host = "localhost:3306"; 
  $usuario = "root"; 
  $senha = ""; 
  $banco = "teste-lqdi"; 
  $conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
  if (mysqli_connect_errno()) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
  }

// Pega os valores do formulário e sanitiza o e-mail
  $nome = $_POST["nome"];
  $email = filter_var(strtolower($_POST["email"]), FILTER_SANITIZE_EMAIL);

// Verifica se o e-mail já existe no banco de dados
  $sql_verifica_email = "SELECT id FROM inscricoes WHERE email='$email'";
  $resultado = mysqli_query($conexao, $sql_verifica_email);
  if (mysqli_num_rows($resultado) > 0) {
    echo "Este e-mail já foi registrado.";
  } else {
    // Insere os valores no banco de dados
    $sql_insere_inscricao = "INSERT INTO inscricoes (nome, email) VALUES ('$nome', '$email')";
    if (mysqli_query($conexao, $sql_insere_inscricao)) {
      $id_inscricao = mysqli_insert_id($conexao);
      echo "Sua inscrição foi registrada com sucesso! Seu ID de inscrição é $id_inscricao.";
    } else {
      echo "Erro ao registrar inscrição: " . mysqli_error($conexao);
    }
  }


// Fecha a conexão com o banco de dados
mysqli_close($conexao);

// // voltar pra home
// header("Location: index.php");

