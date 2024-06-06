<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <style>
        body {
            padding: 20px;
        }

        legend {
            text-align: center;
        }
    </style>

</head>

<body>
    <?php
        include_once('menu.php');
    ?>

    <form class="form-horizontal" action="usuarios.php" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Cadastrar Usuários</legend>

            <!-- email-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">e-mail:</label>
                <div class="col-md-4">
                    <input id="email" name="email" type="email" placeholder="" class="form-control input-md" 
                    required="" maxlength="100">

                </div>
            </div>

            <!-- user -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="usuario">Usuário:</label>
                <div class="col-md-4">
                    <input id="usuario" name="usuario" type="text" placeholder="" class="form-control input-md"
                    required="" maxlength="14">

                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="senha">Senha:</label>
                <div class="col-md-4">
                    <input id="senha" name="senha" type="password" placeholder="" class="form-control input-md"
                    required="" maxlength="15">

                </div>
            </div>
            <!-- permissao -->
            <div class="form-group">
                <label class="col-md-4 control label" for="permissao">Permissão
                    <span style="color: red">*</span></label>
                <div class="col-md-4">
                    <select id="permissao" name="permissao" class="form-control input-md">
                        <option value="usuario">Usuário</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>
            </div>
            <!-- botao cadastrar -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cadastrar"></label>
                <div class="col-md-8">
                    <button id="cadastrar" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>

        </fieldset>
    </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>


</body>

</html>