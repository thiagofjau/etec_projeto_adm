<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Alterar Produto</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>




        <style>
            body {
                padding: 20px;
            }

            legend {
                text-align: center;
            }
        </style>




  <body>
        <?php
        include_once('menu.php');
        ?>
        <form class="form-horizontal" action="alterar.php" method="post"
            enctype="multipart/form-data">
            <fieldset>
                <!-- nome do form -->
                <legend>Alterar Produto</legend>

                <?php
                $podeAlterar = false;

                //existe o parametro "id"?
                if (isset($_GET['id']))
                {
                    include_once('conexao.php');

                    //obter parametro "id"
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM tabelaimg WHERE id = $id";

                    $resultado = mysqli_query($conexao, $sql);

                    $dados = mysqli_fetch_array($resultado);

                    if (! is_null($dados)) {
                        $podeAlterar = true;
                    }
                }


                if ($podeAlterar) {
                    ?>
                    
                    <input name="id" type="hidden" value="<?=$dados['id']?>">

                    <!-- text input -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="codigo">Código</label>
                        <div class="col-md-4">
                            <input id="codigo" name="codigo" type="text"
                                value="<?=$dados['codigo']?>" placeholder=""
                                class="form-control input-md" maxlength="14">
                        </div>
                    </div>

                    <!-- text input -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="produto">produto
                            <span style="color: red">*</span></label>
                        <div class="col-md-4">
                            <input id="produto" name="produto" type="text"
                                value="<?=$dados['produto']?>" placeholder=""
                                class="form-control input-md" required="" maxlength="80">
                        </div>
                    </div>

                    <!-- text area -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="descricao">Descrição</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="descricao" name="descricao"
                                maxlength="250"><?=$dados['descricao']?></textarea>
                        </div>
                    </div>

                    <!-- text input -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="data">Data</label>
                        <div class="col-md-4">
                            <input id="data" name="data" value="<?=$dados['data']?>"
                                type="date" placeholder="" class="form-control input-md"
                                required="">
                        </div>
                    </div>

                    <!-- file button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="imagem">Imagem</label>
                        <div class="col-md-4">
                            <input type="hidden" name="imagem_atual"
                                value="<?=$dados['imagem']?>">
                            <input id="imagem" value="" name="imagem" class="input-file"
                                type="file"> <span><?=$dados['imagem']?></span>
                        </div>
                    </div>

                    <!-- text input -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="valor">Valor
                            <span style="color: red">*</span></label>
                        <div class="col-md-4">
                            <input id="valor" name="valor" value="<?=$dados['valor']?>"
                                type="number" step="any" placeholder=""
                                class="form-control input-md" required="">
                        </div>
                    </div>
                    <?php
                        mysqli_close($conexao);
                }
                 else {
                    echo "<p style='text-align: center; color:red;'>Não foi possível carregar os dados do produto.</p>";
                }
                ?>

                <!-- button double -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnCadastrar"></label>
                    <div class="col-xs-8">
                        <button id="btnCadastrar" name="btnCadastrar"
                        class="btn btn-success"
                        <?php echo ($podeAlterar ? '' : 'disabled')?>>Salvar</button>
                        <a href="consulta.php" id="btnLista" name="btnLista"
                            class="btn btn-info" role="button">Lista de Produtos</a>
                    </div>
                </div>

            </fieldset>
        </form>
            








    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>