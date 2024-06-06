<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Cadastro de Produtos</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->

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
//recebe dados do form e grava no banco
include_once('conexao.php');

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = md5($senha); //chama variavel senha, atribui md5 que é o comando de criptagrafar. criptografa a senha lá no banco
$permissao = $_POST['permissao'];

$sqlInsert = "INSERT INTO tabela_usuarios (usuario, email, senha, permissao)
            VALUES ('$usuario', '$email', '$senha', '$permissao')";

$resultado = mysqli_query($conexao, $sqlInsert);

if (! $resultado)
    {
        die('Não foi possível cadastrar. Descrição: '. mysqli_error($conexao));
    }
else
    {
        echo "<h3>Usuário cadastrado com sucesso</h3>";
    }

    mysqli_close($conexao);

?>
<br><br>


<?php
  if ($resultado) {
        echo '<input type="button" 
            onclick="window.location=\'index.php\'"
            value="Login" class="btn btn-info">';
  } else {
    echo '<input type="button" 
          onclick="history.back()"value="voltar" class="btn btn-info">';
  }
  ?>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>