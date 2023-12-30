<?php
session_start();
           if (isset($_SESSION['id'])) {
$id = $_SESSION['id'];}
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Agendamento de Quadras</title>
    <link rel="icon" href="img/calendar4-week.svg">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

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
    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 form-container">
            <h2 class="mb-4 text-center">Agendamento de Quadras Poliesportivas</h2>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="day">Dia desejado:</label>
                    <input type="date" class="form-control" id="day" name="day" required>
                </div>
                <div class="form-group">
                    <label for="quadra">Quadra desejada:</label>
                    <select class="form-control" id="quadra" name="quadra" required>
                        <option value="">Selecione a atividade</option>
                        <option value="1">Quadra 1</option>
                        <option value="2">Quadra 2</option>
                        </select>

    </div>
    <div>
                    <label for="activity">Atividade desejada:</label>
                    <select class="form-control" id="activity" name="activity" required>
                        <option value="">Selecione a atividade</option>
                        <option value="Basketball">Basquete</option>
                        <option value="Volleyball">Vôlei</option>
                        <option value="Futebol">Futebol</option>
                        <option value="Handebol">Handebol</option>
                        <!-- Adicione outras opções conforme necessário -->
                    </select>
                </div>
                <br>
                
                <?php 
           if (isset($_SESSION['nome'])) {
            $nome = $_SESSION['nome'];

echo $nome;
           }
            else{ ?>
            <form class="d-flex" role="search">
              <a href="login.php" class="btn btn-outline-dark" style="margin-right:5%;">Login</a>
              <a href=" escolhalogin.php" class="btn btn-outline-dark">Cadastro</a>
            </form>
            <?php }?>
            <br>
            <button type="submit" class="btn btn-primary btn-block"><a href="index.html" style="text-decoration: none; color: white;">Voltar para página inicial</a></button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php

if (isset($_POST['cadastrar'])) {

    $dia = $_POST['day'];
    $quadra = $_POST['quadra'];
    $atividade = $_POST['activity'];

    $query = "SELECT dia from agendamento where dia = '$dia'";
    $row = mysqli_query($conn, $query);
    if (mysqli_num_rows($row) > 0) {
        echo "<script type='text/javascript'>OpcaoMensagens(26);</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=login.php">';
    } else {
        echo $query = "INSERT INTO agendamento (dia, quadra, atividade, aceito) 
	    VALUES ('$dia', '$quadra', '$atividade', 'Pendente')";
        mysqli_query($conn, $query);
        echo "<script>$(document).ready(function() { $('#msgInsert').modal(); })</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php">';
    }
}
?>