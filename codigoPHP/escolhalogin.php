<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Escolha Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #ffffff;
        }

        .container {
            margin-top: 150px;
        }

        .card {
            background-color: rgba(0, 123, 255, 0.7);
            color: #ffffff;
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
    <title>Login</title>
</head>
<body>
<header data-bs-theme="dark">
      <nav class="navbar navbar-expand-md navbar-info fixed-top bg-info">
        <div class="container-fluid">
          <img src="img/calendar4-week.svg" style="width: 25px; height: 25px; margin-right: 10px; color: white" alt="">
          <a class="navbar-brand" href="#" style="color: black;">Poliesportivo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-5 mb-md-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color: black;" href="index.php">Ínicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color: black;" href="agendamento.php">Agendamento</a>
              </li>
              <li class="nav-item">
              </li>
            </ul>
            <?php 
           if (isset($_SESSION['nome'])) {
            $nome = $_SESSION['nome'];

echo $nome;
?> <p class="invisible">_</p><a href="sair.php" class="btn btn-outline-dark" style="margin-right:5%;">Sair</a><?php
           }
            else{ ?>
            <form class="d-flex" role="search">
              <a href="login.php" class="btn btn-outline-dark" style="margin-right:5%;">Login</a>
              <a href=" escolhalogin.php" class="btn btn-outline-dark">Cadastro</a>
            </form>
            <?php }?>
          </div>
        </div>
      </nav>
    </header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Cadastro Quadras Poliesportivas</h3>
                </div>
                <div class="card-body text-center">
                    <p>Escolha o tipo de Cadastro</p>
                    <a href="cadcliente.php" class="btn btn-primary">Cadastro como Usuário</a>
                    <a href="cadadm.php" class="btn btn-danger">Cadastro como Administrador</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
