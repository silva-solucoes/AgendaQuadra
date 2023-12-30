<?php
    //código para conexão com banco de dados
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bdname = "agendaquadra";

    //criar a conexão
    $conn = mysqli_connect($servidor, $usuario, $senha, $bdname);
?>