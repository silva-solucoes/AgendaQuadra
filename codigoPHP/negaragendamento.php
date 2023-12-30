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
    
    <?php
        include_once("conexao.php");
        $id = $_GET['id'];


            $sql = "SELECT * FROM agendamento WHERE id  = $id";
            $res = mysqli_query($conn, $sql);
            $rowBusca = mysqli_fetch_assoc($res);

            $aceito = "aceito";

            $result_usuario = "UPDATE agendamento SET aceito = 'Negado' WHERE id = '$id'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);

            if (mysqli_affected_rows($conn)) {
                echo "<script>$(document).ready(function() { $('#msgEdit').modal(); })</script>";
                echo '<meta HTTP-EQUIV="Refresh" CONTENT="4; URL=listpendentes.php">';
            } else {
                echo "<script>$(document).ready(function() { $('#msgErro').modal(); })</script>";
                echo '<meta HTTP-EQUIV="Refresh" CONTENT="4; URL=listpendentes.php">';
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