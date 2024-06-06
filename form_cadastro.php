
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
    <!-- formulario -->
    <form class="form-horizontal" action="cadastro.php" method="post" 
    enctype="multipart/form-data">
    <!-- enctype multform form data faz o upload do arquivo -->
        <fieldset>
            <!-- nome do formulario -->
            <legend>Novo Produto</legend>
            <!-- codigo-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="codigo">Código:</label>
                <div class="col-md-4">
                    <input id="codigo" name="codigo" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>
            <!-- produto-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="produto">Produto:</label>
                <div class="col-md-4">
                    <input id="produto" name="produto" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>
            <!-- descricao -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao">Descrição</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="descricao" name="descricao"></textarea>
                </div>
            </div>
            <!-- data-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="data">Data:</label>
                <div class="col-md-4">
                    <input id="data" name="data" type="date" placeholder="" class="form-control input-md" required="">
                </div>
            </div>
            <!-- imagem -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="imagem">Imagem:</label>
                <div class="col-md-4">
                    <input id="imagem" name="imagem" class="input-file" type="file">
                </div>
            </div>
            <!-- valor-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="valor">Valor: R$</label>
                <div class="col-md-4">
                    <input id="valor" name="valor" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>
            <!-- botao duplo cadastro e lista de produtos -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cadastrar"></label>
                <div class="col-md-4">
                    <button id="cadastrar" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                    <button id="listaprodutos" name="listaprodutos" class="btn btn-info">Lista de Produtos</button>
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