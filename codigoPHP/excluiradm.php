<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="js/janccccelasModais.js"></script>
<link rel="icon" href="img/calendar4-week.svg">
<script src="js/funcao.js"></script>
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
    
    <?php
        session_start();
        include_once("conexao.php");
        $id = $_GET['id'];

        if (!empty($id)) {
            $sql = "SELECT * FROM administrador WHERE id = $id";
            $res = mysqli_query($conn, $sql);
            $rowBusca = mysqli_fetch_assoc($res);

            $status;

            if ($rowBusca['ativo'] == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $result_usuario = "UPDATE administrador SET ativo = $status WHERE id = '$id'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);

            if (mysqli_affected_rows($conn)) {
                echo "<script>$(document).ready(function() { $('#msgEdit').modal(); })</script>";
                echo '<meta HTTP-EQUIV="Refresh" CONTENT="4; URL=listadm.php">';
            } else {
                echo "<script>$(document).ready(function() { $('#msgErro').modal(); })</script>";
                echo '<meta HTTP-EQUIV="Refresh" CONTENT="4; URL=listadm.php">';
            }

        } else {
            echo "<script>$(document).ready(function() { $('#msgErro').modal(); })</script>";
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="4; URL=listadm.php">';
        }

    ?>

        <div id="msgEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-center">
                        <h5 class="modal-title" id="visulUsuarioModalLabel">Informação!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Registro alterado com sucesso!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="msgErro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-center">
                        <h5 class="modal-title" id="visulUsuarioModalLabel">Informação!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Ocorreu um erro!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>