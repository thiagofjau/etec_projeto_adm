<?php
$paginaAtual = basename($_SERVER['PHP_SELF']);
?>
<div style="height: 50px">&nbsp;</div>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
            data-target="#bs-example-navbar-collapsed-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- ALTEREI O INDEX.PHP abaixo -->
            <a class="navbar-brand" href="index.php">Projeto ADM</a> 
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <!-- essa li tem um php com if ternário, se pagina atual for === home, fica active(cinza escuro), se nao, mantem clarinha -->
            <li <?php echo ($paginaAtual === 'home.php' ? 'class="active"'
                        : '') ?>>
                    <a href="home.php">Home</a>
                </li>
                <li <?php echo ($paginaAtual === 'consulta.php' ? 'class="active"'
                        : '') ?>>
                    <a href="consulta.php">Produtos</a>
                </li>
                <li <?php echo ($paginaAtual === 'consulta_usuarios.php' ?
                        'class="active"' : '') ?>><a href="consulta_usuarios.php">Usuários</a>
                </li>
            </ul>
           
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:void(0)">
                    <?=(isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '')?>
                </a></li>
                <!-- acima é para chamar o user no topo da tela -->
                <li><a href="logout.php">Logout</a></li>
        </div>
    </div>
</nav>