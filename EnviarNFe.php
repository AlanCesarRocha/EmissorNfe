<?php

error_reporting(E_ALL);
require_once '../NF-e/vendor/autoload.php';
require_once '../NF-e/Connection.php';

use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Common\Standardize;

$fornecedor = [
    "CRT" => 1,
    "tpAmb" => 2,
    "razao" => 'Alan Cesar Santos Rocha LTDA', //$razao = isset($_POST['razao'] ? $_POST['razao'] : '')
    "nomeFantasia" => 'Artgio Serviços de Informatica LTDA', //$nFantasia = isset($_POST['nFantasia'] ? $_POST['nFantasia'] : '')
    "SiglaUf" => "RJ",
    "cUf" => "33",
    "cnpj" => '101102103000100', //$cnpj = isset($_POST['cnpj'] ? $_POST['cnpj'] : '')
    "cpf" => '', //$cpf = isset($_POST['cpf'] ? $_POST['cpf'] : '')
    "ie" => '123456789', //$ie = isset($_POST['ie] ? $_POST['ie'] : '')
    "im" => '', //$im = isset($_POST['im'] ? $_POST['im'] : '')
    "cnae" => '', //$cnae= isset($_POST['cnae'] ? $_POST['cnae'] : '')
    "fone" => '970379399',
    "logra" => 'Rua Antonio badajos',
    "nro" => '214',
    "cpl" => 'Apartamento 101',
    "bairro" => 'Osvaldo Cruz',
    "cMun" => "3304557",
    "nMun" => 'Rio de Janeiro',
    "uf" => "RJ",
    "cep" => '21351170',
    "cPais" => '1058',
    "xPais" => 'Brasil',
    "schemes" => "PL_008i2",
    "versao" => "3.10",
    "tokenIBPT" => "AAAAAAA",
    "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
    "CSCid" => "000001",
    "aProxyConf" => [
        "proxyIp" => "",
        "proxyPort" => "",
        "proxyUser" => "",
        "proxyPass" => ""
    ]
];

$configJson = json_encode($fornecedor);

$configJson = json_encode($fornecedor);

$pathcertificado = "../NF-e/certificados/sistemasintegrado_housedev_xyz_c5e7d_8eeb7_1526947199_f52a35dbf98d2ea80066ed9b88d715e3.crt";
$content = file_get_contents($pathcertificado);

$query = "SELECT chave FROM nfec where nota  = 1";
$stmt = Connection::Connectar()->prepare($query);
$stmt->execute();
while ($nf = $stmt->fetchall(PDO::FETCH_ASSOC)) {

    if (count($nf) > 0) {

        foreach ($nf as $nfe) {
            echo 'Chave' . $nfe['chave'] . '<br/>';
        }
    }
}
try {

    $tools = new Tools($configJson, Certificate::readPfx($content, /* $password */ '0644'));
    $tools->model('55');
    $chave = $nf['chave'];

    //Carrega o Xml assinado ,com a certificação digital
    $pathxml = "../NF-e/NF-e_emitidas/assinados/{$chave}.xml";
    $xml = file_get_contents($pathxml);

    //Envia a NFe para a Sefaz e grava o xml de envio e de retorno
    $retorno = $tools->sefazEnviaLote([$xml], 12, 0);
    $recebido = $tools->lastResponse;
    $enviado = $tools->lastResponse;

    //Tratando o retorno 
    $stdretorno = new Standardize($retorno);
    $sretorno = $stdretorno->toStd();
    $recibo = $std->infRec->nRec;
    echo 'Motivo :' . $td->xMotivo . '<br/>';
    echo $std->cStat . '<br/>';
    echo $recibo;

    $rec = $queryupdate = "Update Nfec set  recibo = $recibo where nota = 1";
    $stm = Connection::Connectar()->prepare($queryupdate);
    $stm->execute();
    while ($nfe = $stm->fetchall(PDO::FETCH_ASSOC)) {

    if (count($nfe) > 0) {

        foreach ($nfe as $nfee) {
            echo 'Chave' . $nfee['chave'] . '<br/>';
        }
    }else{
        
        echo 'Sua NFe não foi enviada.';
    }
}
} catch (\Exception $e) {

    echo 'Error in signure :' . $e->getMessage();
}