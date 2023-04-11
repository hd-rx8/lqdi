<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teste LQDI</title>
  <!-- CSS do Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

  <!-- JS do Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <style>
    body {
      background-color: #e2e2e2;
    }

    .jumbotron {
      text-align: center;
    }

    .jumbotron h1,
    .jumbotron p {
      color: #333;
    }

    .jumbotron input {
      margin: 20px 0;
    }
  </style>

</head>
<body>
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3 mt-1">Formulário</h1>
      <p class="lead">Com as devidas validações.</p>
      <div class="row d-flex justify-content-center align-items-center">
  
        <div>
          <form action="process_form.php" method="post">

          <label for="nome">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o seu nome..."><br><br>
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu email..."><br><br>
          <input type="submit" value="Enviar" class="w-50">
          <br>

          <!-- Lista em Json -->
          <a href="json_list.php">Listar em Json</a> <br><br>
          <br>
          </form> 

          <!-- PHPMAILER -->
          <form action="mailtrap.php">
            <button class="form-control" type="submit" name="enviar">Enviar Mailtrap</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>