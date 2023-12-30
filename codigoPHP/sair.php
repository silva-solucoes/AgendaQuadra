<?php
    /* Caso o usário não esteja autenticado,  limpa os dados e redireciona */
    if (!isset($_SESSION['email']) && !isset($_SESSION['senha'])) {
        session_start();
        session_destroy();
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        header("location: index.php");
    }
?>