<?php

require_once './vendor/autoload.php';

$nfe = new \NFePHP\NFe\Make();


$fornecedorEnd = [
    'cnpj' => '1011021030001',//$cnpj = isset($_POST['cnpj'] ? $_POST['cnpj'] : '');
    'cpf' => '09122767703',//$cpf = isset($_POST['cpf'] ? $_POST['cpf'] : '');
    'ie' => '123456789',//$ie = isset($_POST['ie] ? $_POST['ie'] : '');
    'Im' => '',//$im = isset($_POST['im'] ? $_POST['im'] : '');
    'cnae' => '',//$cnae= isset($_POST['cnae'] ? $_POST['cnae'] : '');
    'razao' => 'Alan Cesar LTDA',//$razao = isset($_POST['razao'] ? $_POST['razao'] : '');
    'nomeFantasia' => 'Artgio Serviços de Informatica LTDA',//$nFantasia = isset($_POST['nFantasia'] ? $_POST['nFantasia'] : '');
    'xLgr' => 'Rua Antônio badajós',
    'nro' => '214',
    'xCpl' => 'Apartamento 101',
    'xBairro' => 'Osvaldo Cruz',
    'cMun' => '048',
    'xMun' => 'Rio de Janeiro',
    'UF' => 'RJ',
    'CEP' => '21351170',
    'cPais' => '55',
    'xPais' => 'Brasil',
    'fone' => '970379399'
];

//Gerador de chave------------------------------
$std = new stdClass();
$std->cUf = 48;
$std->cNf = STR_PAD(1,8,'0',STR_PAD_LEFT);
$std->natOp = 'Venda de mercadoria adquirida de terceiros';
$std->indPag =0;
$std->mod = 55;
$std->serie = 1;
$std->nNf= 1;


$chave = \NFePHP\Common\Keys::build(
        
        $std->cUf, 
        date('y', strtotime('now')),
        date('m', strtotime('now')),
        $std->Cnpj = $fornecedorEnd['cnpj'],
        $std->mod,
        $std->serie,
        $std->nNf,
        $std->cNf
);
$std->cDv = substr($chave, 1);
$nfe->tagide($std);
unset($std);
//---------------------------------------
//Endereço do emitente --------------------
$std = new \stdClass();
$std->cUf = $fornecedorEnd['xLgr'];
$std->nro = $fornecedorEnd['nro'];
$std->xCpl = $fornecedorEnd['xCpl'];
$std->xBairro = $fornecedorEnd['xBairro'];
$std->cMun = $fornecedorEnd['cMun'];
$std->xMun = $fornecedorEnd['xMun'];
$std->UF = $fornecedorEnd['UF'];
$std->CEP = $fornecedorEnd['CEP'];
$std->cPais = $fornecedorEnd['cPais'];
$std->xPais = $fornecedorEnd['xPais'];
$std->fone = $fornecedorEnd['fone'];

$nfe->tagenderEmit($std);
unset($std);
//-------------------------------------------