<?php
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="icon" href="img/calendar4-week.svg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<section class="position-absolute top-0 start-0 end-0 h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-1 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="text-info mt-1 mb-3 pb-3">Entrar</h4>
                </div>

                        <form action="verifica_loginadm.php" method="post">
                            <div class="form-group">
   
                                <input type="email" class="form-control mb-4 text-center" id="email" aria-describedby="emailHelp"
                                    placeholder="Digite seu email" name="email">
                            </div>

                            <div class="form-group">

                                <input type="password" class="form-control mb-4 text-center" id="senha"
                                    placeholder="Digite sua senha" name="senha">
                            </div>

                            <button type="submit" class="btn mb-4 bg-info text-light px-5"  name="logar">Logar</button>
                        </form>
              </div>
            </div>
            <div class="col-lg-6 bg-info d-flex align-items-center gradient-custom-2">
            <img src="img/raquete.jpg" width="100%"
                    style="height: 100%" alt="foto">
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