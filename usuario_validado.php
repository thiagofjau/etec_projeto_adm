<?php
session_start();
if (!isset($_SESSION['usuario']))
{
    header("location:index.php");
} else {
    if (! isset($permissao)) {
        $permissao = null;
    }

    if ($permissao != null && $_SESSION['permissao'] != $permissao) {
        header('location:sem_permissao.php');
    }
}
?>