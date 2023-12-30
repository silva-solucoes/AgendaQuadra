<?php
session_start();
include_once("conexao.php");
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site Massa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Agendamento de Quadras</title>
  <link rel="icon" href="img/unnamed-removebg-preview.png">
  <style>
    #body {
      font-family: Calibri;
    }

    .container {
      position: relative;
      text-align: center;
      max-width: 100%;
    }

    .image {
      width: 100%;
      height: auto;
    }

    .overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      padding: 20px;
      color: #fff;
    }

    .text {
      font-size: 24px;
      font-weight: bold;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      margin-top: 10px;
    }

    .card {
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      margin: 10px;
      display: inline-block;
      transition: transform 0.3s, box-shadow 0.1s;
      cursor: pointer;
      overflow: hidden;
    }

    .card:hover {
      transform: scale(1.1);
      box-shadow: 0 0 10px 5px #4B85AD;
    }
  </style>
</head>

<body class="bg-light" id="body">
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

  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">


    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 mt-5 mb-4 text-center">
                <h1>Lista de Pedidos Aceitos</h1>
            </div>
            <div class="col-sm-12 mb-4">
                <a href="home.php" class="btn pull-right" style="border: 1px solid #397bff;">Voltar</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dia</th>
                            <th>Quadra</th>
                            <th>Atividade</th>
                            <th>Situação</th>

                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $sql = "SELECT * FROM agendamento";
                             $result = mysqli_query($conn, $sql);
                             while ($row_ = mysqli_fetch_assoc($result)) {
                               if ($row_['aceito'] == "Aceito") {
                                ?>
                            <tr>
                                <td>
                                    <?php echo $row_['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row_['dia']; ?>
                                </td>
                                <td>
                                    <?php echo $row_['quadra']; ?>
                                </td>
                                <td>
                                    <?php echo $row_['atividade']; ?>
                                </td>
                                <td>
                                    <?php echo $row_['aceito']; ?>
                                </td>

                            </tr>
                            
                            <?php
                        }}
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
        integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous">
        </script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>