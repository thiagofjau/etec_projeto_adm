<?php
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

            h3 {
                text-align: center;
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
                <h3>Consultar Produtos</h3><br>
                <div>
                    <input type="button" onclick="window.location='form_cadastro.php'" value="Cadastrar" class="btn btn-info">
                </div>
            </div>
        </div> <br>
        <!-- tabela -->
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Imagem</th>
                    <th>Valor</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </thead>
                <tbody>
                    <?php
                    include_once('conexao.php');
                    $sql = "SELECT * FROM tabelaimg ORDER BY id"; //$sql é uma variavel e pode ter qlq nome, ela recebe o comando na frente
                    //$sql seleciona tudo da tabelaimg ordenado por id preparando para jogar no resultado
                    $resultado = mysqli_query($conexao, $sql); //aqui executa o comando conectando no banco puxando as infos do $sql acima e usando a conexao banco
                    while ($dados = mysqli_fetch_array($resultado)) { // abriu while, cria o array $dados puxando resultado
                        $dataFormatada = ""; //formatacao de data br
                        if (!is_null($dados['data'])) { //if data "is_null(não é nula), array dados puxa 'data' string
                            $dataAtual = strtotime($dados['data']); //cria var dataatual recebe strtotime(string to time) array dados puxando string data
                            $dataFormatada = date("d/m/Y", $dataAtual); //data formatada recebe funcao date e parametros d/m/Y, atribundo à dataAtual
                            if ($dataFormatada === "01/01/1970") //if dataFormatada é exatamente igual 1/1/1970, dataFormatada recebe -
                                $dataFormatada = "-";
                        }
                        $imagem = "sem_imagem.jpg"; //imagem recebe imagem vazia
                        if ($dados['imagem'] !== "") { //if array dados string imagem não é igual a ""(vazio)...
                            $imagem = $dados['imagem']; //imagem recebe array/string que foi enviada
                        }


                        $descricao = $dados['descricao']; //limitar texto por char. criar var descricao recebe array/descricao...
                        $descricaoCurta = $dados['descricao']; //nova variavel para usar na pagina normal e ter a completa acima quando chamar modal com descri completa
                        if (strlen($descricaoCurta) > 50) { //se strlen(string lenght) descricao for >maior que 50...
                            $descricaoCurta = mb_substr($descricaoCurta, 0, 50, 'UTF-8') . '...'; //descricao = funcao mb_substr descricao..
                            //, do 0 ao char 50 e define que é UTF-8 .(ponto) concatena como o + '...'<-reticências
                        }
                        $id = $dados['id'];
                        $codigo = $dados['codigo'];
                        $produto = $dados['produto'];
                        $valor = number_format($dados['valor'], 2, ",", ".");
                        //  "pausou"PHP aqui->   
                    ?>
                        <tr>
                            <td><?php echo $codigo //essa linha pode ser escrita da forma abaixo <?==phpComEcho 
                                ?></td>
                            <td><?= $produto ?></td>
                            <td><?= $descricaoCurta ?></td>
                            <td><?= $dataFormatada ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#detalhes<?= $id //essa linha é link para abrir um modal 
                                                                                        ?>">
                                    <img src="imagens/<?= $imagem ?>" title="<?= $imagem ?>" style="width: 80px">
                                </a>
                            </td>

                            <td>R$ <?= $valor ?></td>
                            </td>
                            <td>
                                <a href="form_alterar.php?id=<?= $dados['id'] ?>" id="btnLista" title="Alterar" name="btnLista" class="btn btn-primary btn-xs" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-xs" onclick="document.getElementById('id_exclusao').value=<?= $dados['id'] ?>" data-title="Delete" data-toggle="modal" data-target="#delete">
                                    <span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                        <!-- div do modal   -->
                        <div class="modal fade" id="detalhes<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="modalLabel">Detalhes do Produto</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div style="display: grid; grid-template-columns: 1fr 3fr;">
                                            <div>
                                                <img src="imagens/<?= $imagem ?>" style="height: 250px;">
                                            </div>
                                            <div style="padding-left: 15px;">
                                                <p><b>Código:</b> <?= $codigo ?></p>
                                                <p><b>Produto:</b> <?= $produto ?></p>
                                                <p><b>Descrição:</b> <?= $descricao ?></p>
                                                <p><b>Preço:</b> <?= $valor ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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



<!-- Formulário modal de exclusão -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  </button>
                  <h4 class="modal-title custom_align" id="Heading">Excluir Produto</h4>
              </div>
              <div class="modal-body">
                  Tem certeza que deseja excluir este produto?
              </div>
              <div class="modal-footer ">
                  <input type="hidden" id="id_exclusao">
                  <button onclick="window.location='excluir.php?id='+document.getElementById('id_exclusao').value" type="button" class="btn btn-success">
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