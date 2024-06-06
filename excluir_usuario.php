<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Projeto ADM</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <style>
            body {
                padding: 45px;
            }

        </style>
</head>

    <body>
        <?php 
            include_once('menu.php');
            ?>
            <?php
            include_once('conexao.php');
            $id = $_GET['id'];
            
            $sqlDelete = "DELETE FROM tabela_usuarios WHERE id = $id";
            
            $resultado = mysqli_query($conexao, $sqlDelete);

            if (! $resultado){
                die('Não foi possível excluir. Descrição: '. mysqli_errno($conexao));
            } else {
                echo "<h3>Usuário excluído com sucesso</h3>";
            }

            mysqli_close($conexao);
        ?>
        <br><br>
        <a href="consulta_usuarios.php" id="btnLista" name="btnLista" class="btn btn-info" role="button">
            Consultar Usuários</a>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </body>

</html>