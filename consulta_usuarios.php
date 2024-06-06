<?php
$permissao = 'administrador';
include_once('usuario_validado.php');
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CONSULTA</title>

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
                padding: 20px;
            }

           
        </style>
</head>

<body>
    <?php
    include_once('menu.php');
    ?>
    <div id="content" class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Consultar Usuários</h3><br>
                <div>
                    <input type="button" onclick="window.location='form_usuarios.php'" value="Cadastrar" class="btn btn-info">
                </div>
            </div>
        </div> <br>
        <!-- tabela -->
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Permissão</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </thead>
                <tbody>
                    <?php
                    include_once('conexao.php');
                    $sql = "SELECT * FROM tabela_usuarios ORDER BY id"; //$sql é uma variavel e pode ter qlq nome, ela recebe o comando na frente
                    //$sql seleciona tudo da tabela_usuarios ordenado por id preparando para jogar no resultado
                    $resultado = mysqli_query($conexao, $sql); //aqui executa o comando conectando no banco puxando as infos do $sql acima e usando a conexao banco
                    while ($dados = mysqli_fetch_array($resultado)) { // abriu while, cria o array $dados puxando resultado
                        $id = $dados['id'];
                        $usuario = $dados['usuario']; 
                        $email = $dados['email'];
                        $permissao = $dados['permissao'];
                        //  "pausou"PHP aqui->   
                    ?>
                        <tr>
                            <td><?= $usuario?></td> 
                            <td><?= $email ?></td>
                            <td><?= $dados['permissao']?></td>
                            <td>
                                <a href="form_alterar_usuario.php?id=<?= $dados['id'] ?>" id="btnLista" title="Alterar" name="btnLista" class="btn btn-primary btn-xs" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-xs" onclick="document.getElementById('id_exclusao').value=<?= $dados['id'] ?>" data-title="Delete" data-toggle="modal" data-target="#delete">
                                    <span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                       
                    <?php
                    } // fechou while

                    mysqli_close($conexao);
                    //fechou o PHP 
                    ?>
                </tbody>
                <!-- tbody -->
            </table>
        </div>
        <!-- fim da tabela -->
    </div>



<!-- modal de exclusão -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  </button>
                  <h4 class="modal-title custom_align" id="Heading">Excluir Usuário</h4>
              </div>
              <div class="modal-body">
                  Tem certeza que deseja excluir este Usuário?
              </div>
              <div class="modal-footer ">
                  <input type="hidden" id="id_exclusao">
                  <button onclick="window.location='excluir_usuario.php?id='+document.getElementById('id_exclusao').value" type="button" class="btn btn-success">
                      <span class="glyphicon glyphicon-ok-sign"></span> Sim
                  </button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">
                      <span class="glyphicon glyphicon-remove"></span> Não
                  </button>
              </div>
          </div>
      </div>
  </div>


    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>