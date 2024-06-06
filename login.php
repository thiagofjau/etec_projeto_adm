<?php
include_once("conexao.php");

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senha = md5($senha);
$query = "SELECT * FROM tabela_usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

$result = mysqli_query($conexao, $query);

$permissao = 'usuario';
while ($dados = mysqli_fetch_array($result)) {
    if (! is_null($dados['permissao']))
        $permissao = $dados['permissao'];
}

mysqli_close($conexao);

if(mysqli_num_rows($result) > 0)
{
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['permissao'] = $permissao;
    header("location:home.php");
}
else
{
    header("location:index.php?login_invalido=1"); //precisa de um valor, ex: =1
}



?>