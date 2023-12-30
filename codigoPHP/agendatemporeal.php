<?php
session_start();
           if (isset($_SESSION['id'])) {
$id = $_SESSION['id'];}
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendamento Poliesportivo</title>
  <link rel="icon" href="img/calendar4-week.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f4f4f4;
    }

    #calendar {
      max-width: 800px; /* Ajuste o valor conforme necessário */
      width: 100%;
      margin: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      overflow: hidden;
    }

    #header {
      display: flex;
      justify-content: space-between;
      padding: 10px;
      background-color: #3498db;
      color: #fff;
      font-size: 18px;
    }

    #days {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 1px;
    }

    .day {
      padding: 15px;
      text-align: center;
      border: 1px solid #ccc;
      background-color: #fff;
    }

    #prevMonth, #nextMonth {
      cursor: pointer;
      padding: 10px;
      background-color: #2980b9;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      margin: 10px;
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


   <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .event {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 4px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
    <header>
        <h1>Dias Agendados</h1>
    </header>

    <main>
        <h2></h2>
        Ano Dia Mês<br>
        ---------------
        <br>
        <?php
                             $sql = "SELECT * FROM agendamento";
                             $result = mysqli_query($conn, $sql);
                             while ($row_ = mysqli_fetch_assoc($result)) {
                               if ($row_['aceito'] == "Aceito") {
                      
                                ?>
                            <tr>
                                <td> 
                                    <?php 
                                    echo $row_['dia']; ?>
                                    <br>
                                    ---------------
                                    <br>
                                </td>
                                <?php } } ?>


        <ul id="agenda"></ul>
    </main>

    <div id="calendar">
  <div id="days"></div>
</div>
<div>
    <a href="agendamento.php"><button class="btn btn-outline-dark ">Solicitar Agendamento</button></a>
</div>


</body>
</html>
