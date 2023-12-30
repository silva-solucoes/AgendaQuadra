<?php
include_once("conexao.php");
$di = $_GET['id'];
$id = $di;
$query = "SELECT * FROM administrador WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Administrador</title>
    <link rel="icon" href="img/calendar4-week.svg">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'
        type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        function mascaraData(campo, e) {
            var kC = (document.all) ? event.keyCode : e.keyCode;
            var data = campo.value;

            if (kC != 8 && kC != 46) {
                if (data.length == 2) {
                    campo.value = data += '/';
                } else if (data.length == 5) {
                    campo.value = data += '/';
                } else
                    campo.value = data;
            }
        }
    </script>
    <script src="js/funcao.js"></script>
    <style>
        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }
    </style>
    <link rel="stylesheet" href="lib/css/style.css">
    <link rel='stylesheet' href='lib/fullcalendar/main.min.css' />
    <!-- calendario exibir o evento -->
    <link href='css/core/main.min.css' rel='stylesheet' />
    <link href='css/daygrid/main.min.css' rel='stylesheet' />
    <script src='js/core/main.min.js'></script>
    <script src='js/interaction/main.min.js'></script>
    <script src='js/daygrid/main.min.js'></script>
    <script src='js/core/locales/pt-br.js'></script>
    <!-- JANELA MODAL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="js/janelaModalExcluir.js"></script>
    <script src="js/janelasModais.js"></script>
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
        <div class="row mt-5">
            <div class="col-sm-12 mt-5 mb-4 text-center">
                <br>
                <h1>ALTERAR ADMIN</h1>
            </div>
            <form action="" method="post">
                <div class="row">

                    <div class="col-sm-4 mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            value="<?php echo $row['nome']; ?>">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="text" class="form-control" id="senha" name="senha"
                            value="<?php echo $row['senha']; ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="tipo_acesso" class="form-label">Tipo de acesso</label>
                        <select name="tipo_acesso" id="tipo_acesso" class="form-control"
                            value="<?php echo $row['tipo_acesso']; ?>">
                            <option value="">Selecione o tipo de acesso</option>
                            <?php if ($row['Administrador'] == "Administrador de Quadra") { ?>
                                <option value="Administrador de Quadra" selected>Administrador de Quadra</option>
                                <option value="Administrador de Sistema">Administrador de Sistema</option>
                            <?php } else { ?>
                                <option value="Administrador de Quadra">Administrador de Quadra</option>
                                <option value="Administrador de Sistema" selected>Administrador de Sistema</option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <button type="button" class="btn btn-info" name="voltar" value="Voltar"
                            onclick="window.location.href='listadm.php'">Voltar</button>
                        <button type="submit" class="btn btn-info" name="alterar">Alterar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- FOOTER -->

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
        integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="//http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
    <script>
        function previewImagem() {
            var imagem = document.querySelector('input[name=arquivo]').files[0];
            var preview = document.querySelector('img[name=visualizar]');
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (imagem) {
                reader.readAsDataURL(imagem);
            } else {
                preview.src = "";
            }
        }
    </script>
    <!-- JANELA MODAL -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- <script src="js/janelasModais.js"></script> -->
    <div id="msgEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <div id="msgErro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
<?php
if (isset($_POST['alterar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_acesso = $_POST['tipo_acesso'];

    $result = "UPDATE administrador SET 
        nome = '$nome', 
        email = '$email', 
        tipo_acesso = '$tipo_acesso'
        WHERE id = $id";
    $resultado = mysqli_query($conn, $result);
    if (mysqli_affected_rows($conn)) {
        echo "<script>$(document).ready(function() { $('#msgEdit').modal(); })</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=listadm.php">';
    } else {
        echo "<script>$(document).ready(function() { $('#msgErro').modal(); })</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=editadm.php">';
    }
}
?>