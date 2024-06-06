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
  <h3>Cadastro de Produtos</h3>
  <?php
  include_once('file-upload.php');
  //o upload ocorreu seu erro?
  if (is_null($mensagemErro)) { //declara mensagemErro como nula,significa q nao teve erro, se ocorrer que der erro no fileupload,
    include_once('conexao.php');

    $codigo = $_POST['codigo'];
    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    // $imagem = $_POST['imagem']; (retira instrucao se tiver fazendo upload do arquivo)
    $data = $_POST['data']; //put codes to format data, criou o date e funcao, chamou data e formatou
    //$date = str_replace('/', '-', $data);
    //$data = $date ('Y-m-d', strtotime($date));
    $valor = $_POST['valor'];

    $sqlInsert = "INSERT INTO tabelaimg (codigo, produto, descricao, imagem, data, valor)
                      VALUES ('$codigo', '$produto', '$descricao', '$imagem', '$data', $valor)";

    $resultado = mysqli_query($conexao, $sqlInsert);

    if (!$resultado) {
      die('Não foi possível cadastrar. Descrição: ' . mysqli_error($conexao));
    } else {
      echo "Registro cadastrado com sucesso";
    }

    mysqli_close($conexao);
  } else {
    echo "<span style='color: red;'>$mensagemErro</span>";
    $resultado = false;
  }
  ?>
  <br><br>
  <?php
  if ($resultado) {
    echo '<input type="button" 
          onclick="window.location=\'form_cadastro.php\'"
          value="Cadastrar" class="btn btn-info">';
  } else {
    echo '<input type="button" 
          onclick="history.back()"value="voltar" class="btn btn-info">';
  }
  ?>

  <a href="consulta.php" id="btnLista" name="btnLista" class="btn btn-info" role="button">Lista de Produtos</a>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>