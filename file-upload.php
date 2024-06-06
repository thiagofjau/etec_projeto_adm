<?php
function formatarTamanhoArquivo($size)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, ',', '.') . ' ' . $units[$power];
}

$mensagemErro = null;

if ($_FILES['imagem']['error'] == 4 || ($_FILES['imagem']['size'] == 0 && $_FILES['imagem']['error'] == 0)) {
    $imagem = null;
} else {
    // Local onde o arquivo será salvo
    $diretorioImagens = "imagens";

    // O diretório de imagens existe?
    if (!file_exists($diretorioImagens)) {
        // Cria o diretório de imagens
        mkdir($diretorioImagens, 0777, true);
    }

    $diretorioArquivo = $diretorioImagens . '/' . basename($_FILES["imagem"]["name"]);

    $extensaoArquivo = strtolower(pathinfo($diretorioArquivo, PATHINFO_EXTENSION));

    $uploadAutorizado = true;

    // O arquivo já existe?
    if (file_exists($diretorioArquivo)) {
        $mensagemErro = "Este arquivo já existe.";
        $uploadAutorizado = false;
    }

    $umMB = 1048576;
    // $umKB = 1024;
    $tamanhoMaximo = $umMB * 1; // 1MB

    $tamanhoArquivo = $_FILES["imagem"]["size"];

    // O tamanho do arquivo está dentro do limite estabelecido?
    if ($tamanhoArquivo > $tamanhoMaximo) {
        $tamanhoMaximoFormatado = formatarTamanhoArquivo($tamanhoMaximo);
        $mensagemErro = "O tamanho do arquivo não pode ser superior a $tamanhoMaximoFormatado. Tamanho atual: " . formatarTamanhoArquivo($tamanhoArquivo);
        $uploadAutorizado = false;
    }

    // A extensão do arquivo é permitida?
    if (!in_array($extensaoArquivo, ["jpg", "jpeg", "png", "gif"])) {
        $mensagemErro = "Apenas arquivos com extensão jpg, jpeg, png ou gif são aceitos.";
        $uploadAutorizado = false;
    }

    // Check if $uploadAutorizado is set to 0 by an error
    if ($uploadAutorizado) {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorioArquivo)) {
            $imagem = htmlspecialchars(basename($_FILES["imagem"]["name"]));
        } else {
            $mensagemErro = "Não foi possível realizar o upload do arquivo";
        }
    }
}
