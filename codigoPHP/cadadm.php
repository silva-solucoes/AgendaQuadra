<?php
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Administradores</title>
        <link rel="icon" href="img/calendar4-week.svg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
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
              <form class="d-flex" role="search">
                <button class="btn btn-outline-dark" style="margin-right:5%;">Login</button>
                <button class="btn btn-outline-dark">Cadastro</button>
              </form>
            </div>
          </div>
        </nav>
      </header>
<section class="position-absolute top-0 start-0 end-0 h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-1 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="text-info mt-1 mb-3 pb-3">Registre-se como administrador!</h4>
                </div>

                <form action="" method="POST">
                    <div class="row">
                  <div class="form-group col-sm-12 mb-3">
						<input type="text" name="nome" class="form-control" placeholder="Insira o seu Nome completo" required>
					</div>

                <div class="form-group col-sm-12 mb-3">
					<input type="email" name="email" class="form-control" placeholder="Insira seu E-mail" required>
				</div>

        <div class="form-group col-sm-12 mb-3">
						<input type="password" name="senha" class="form-control" placeholder="Insira a sua senha" required>
					</div>
                    
                    <div class="form-group col-sm-12 mb-3 text-center">
                                                <select name="tipo_acesso" id="tipo_acesso" class="form-control"
                                                    required>
                                                    <option value="">Selecione o tipo de Administrador</option>
                                                    <option value="Administrador de Quadra">Administrador de Quadra</option>
                                                    <option value="Administrador de Sistema">Administrador de Sistema</option>
                                                </select></div>


                <div class="form-group col-sm-12 mb-2">
						<input type="reset" name="reset" class="btn text-light btn-info pull-right" value="Limpar">
						<input type="submit" name="cadastrar" class="btn text-light btn-info pull-right" value="Cadastrar">

</div>
</div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 bg-info d-flex align-items-center gradient-custom-2">
            <img src="img/raquete.jpg" width="100%"
                    style="height: 80%" alt="foto">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
              </div>
            </div>
          </div>
        </div>
        <div class="position-absolute start-50 end-0">  
      </div>
    </div>
  </div>
</section>
<?php include_once('footer.php');?>
        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<!-- JANELA MODAL -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- <script src="js/janelasModais.js"></script> -->
<div id="msgInsert" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-center">
                <h5 class="modal-title" id="visulUsuarioModalLabel">Informa��o!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Registro cadastrado com sucesso!
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
                <h5 class="modal-title" id="visulUsuarioModalLabel">Informa��o!</h5>
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
if (isset($_POST['cadastrar'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $tipo_acesso = $_POST['tipo_acesso'];
    $senhaCript = password_hash($senha, PASSWORD_DEFAULT);

    $query = "SELECT email from administrador where email = '$email'";
    $row = mysqli_query($conn, $query);
    if (mysqli_num_rows($row) > 0) {
        echo "<script type='text/javascript'>OpcaoMensagens(26);</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=loginadm.php">';
    } else {
        echo $query = "INSERT INTO administrador (nome, email, senha, tipo_acesso, ativo) 
	    VALUES ('$nome', '$email', '$senhaCript', '$tipo_acesso', 1)";
        mysqli_query($conn, $query);
        echo "<script>$(document).ready(function() { $('#msgInsert').modal(); })</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=home.php">';
    }
}
?>