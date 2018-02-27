<?php

require_once '../NF-e/Connection.php';
require_once './vendor/autoload.php';

use NFePHP\NFe\Make;
use NFePHP\Common\Keys;
use NFePHP\Common\Certificate;
use League\Flysystem\Adapter\chmod;

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$nfe = new Make();


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
 "schemes" => "PL_00812",
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

//Preenche as informações da Tag Ide------------------------------
$std = new stdClass();
$std->cUf = $fornecedor['cUf']; //codigo numerico do estado
$std->cNf = STR_PAD(1, 8, '0', STR_PAD_LEFT);
$std->natOp = 'Venda de mercadoria adquirida de terceiros';
$std->indPag = 0; //0=Pagamento à vista; 1=Pagamento a prazo; 2=Outros
$std->mod = 55; //modelo da NFe 55 ou 65 essa última NFCe
$std->serie = 1; //Serie da NFe
$std->nNf = 1; // numero da NFe
$std->dhEmi = date("Y-m-d\TH:i:sP"); //Formato: “AAAA-MM-DDThh:mm:ssTZD” (UTC - Universal Coordinated Time).
$std->dhSaiEnt = null; //Não informar este campo para a NFC-e.
$std->tpNf = 1;
$std->idDest = 1; //1=Operação interna; 2=Operação interestadual; 3=Operação com exterior.
$std->cMunFg = $fornecedor['cMun']; //$fornecedor['cMun'];
$std->tpImp = 4;
$std->tpEmis = 1;
$std->tpAmb = 2; //Tipo de ambiente 1- Produção / 2- Hologação(testes)
$std->finNfe = 1;
$std->indFinal = 1;
$std->indPres = 1;
$std->procEmi = 0;
$std->verProc = '1.0.0';
$std->dhCon = null;
$std->xJust = null;

//Gerador de chave------------------------------
$chave = Keys::build(
                $std->cUf, date('y', strtotime($std->dhEmi)), date('m', strtotime($std->dhEmi)), $std->Cnpj = $fornecedor['cnpj'], $std->mod, $std->serie, $std->nNf, $std->cNf
);
$std->cDv = substr($chave, 1);
$nfe->tagide($std);
unset($std);
//---------------------------------------
//controle de versão------------------------
$std = new stdClass();

$std->versao = '3.10';
$std->id = $chave;
$std->pk_nItem = null;
$nfe->taginfNFe($std);
unset($std);
//---------------------------------------
//Preencher a Tag de emitente---------------
$std = new stdClass();

$std->CNPJ = $fornecedor["cnpj"];
$std->IEST = '';
$std->IM = '';
$std->CNAE = '';
$std->xNome = $fornecedor["razao"];
$std->xFant = $fornecedor["nomeFantasia"];
$std->IE = $fornecedor["ie"];
$std->CRT = $fornecedor["CRT"];

$nfe->tagemit($std);
unset($std);
//---------------------------------------
//Endereço do emitente --------------------
$std = new StdClass();

$std->xLgr = $fornecedor["logra"];
$std->nro = $fornecedor["nro"];
$std->xCpl = $fornecedor["cpl"];
$std->xBairro = $fornecedor["bairro"];
$std->cMun = $fornecedor["cMun"];
$std->xMun = $fornecedor["nMun"];
$std->UF = $fornecedor["uf"];
$std->CEP = $fornecedor["cep"];
$std->cPais = $fornecedor["cPais"];
$std->xPais = $fornecedor["xPais"];
$std->fone = $fornecedor["fone"];

$nfe->tagenderEmit($std);
unset($std);
//-------------------------------------------
$destinatario = [
    "logra" => 'Rua Ernesto Lobão',
    "nro" => '214',
    "cpl" => 'Apartamento 101',
    "bairro" => 'Osvaldo Cruz',
    "cMun" => '3304557',
    "nMun" => 'Rio de Janeiro',
    "uf" => 'RJ',
    "cep" => '21351170',
    "cPais" => '1058',
    "xPais" => 'Brasil',
    "fone" => '970379399'
];

//Preenche Tag do destinatario-------------------
$std = new stdClass();

$std->CNPJ = '101102103000100';
$std->CPF = '';
$std->idEstrangeiro = '';
$std->xNome = "Arthur Cesar Rosa Rocha LTDA";
$std->indIEst = '';
$std->IE = '';
$std->ISUF = '';
$std->IM = '';
$std->email = 'arthurrei@gmail.com';

$nfe->tagdest($std);
unset($std);
//-------------------------------------------
//Endereço do destinatario ---------------------
$std = new stdClass();

$std->xLgr = $destinatario ['logra'];
$std->nro = $destinatario ['nro'];
$std->xCpl = $destinatario['cpl'];
$std->xBairro = $destinatario['bairro'];
$std->cMun = $destinatario['cMun'];
$std->xMun = $destinatario['nMun'];
$std->UF = $destinatario['uf'];
$std->CEP = $destinatario['cep'];
$std->cPais = $destinatario['cPais'];
$std->xPais = $destinatario['xPais'];
$std->fone = $destinatario['fone'];

$nfe->tagenderDest($std);
unset($std);
//------------------------------------------
//Inserindo proddutos a NFe--------------------
$ap[] = [
    "nItem" => 1,
    "cProd" => '15',
    "cEan" => '',
    "xProd" => 'Um produto qualquer indicado pelo cliente',
    "NCM" => '84835090',
    "NVE" => '',
    "CEST" => '0302300',
    "EXITIPI" => '',
    "CFOP" => '5102',
    "uCom" => 'Un',
    "qCom" => '1',
    "vUnCom" => '3000.00',
    "vProd" => '3000.00',
    "cEANTrib" => '',
    "uTrib" => 'un',
    "qTrib" => '1',
    "vUnTrib" => '3000.00',
    "vFrete" => '',
    "vSeg" => '',
    "vDesc" => '',
    "vOutro" => '',
    "indTot" => '1',
    "xPed" => '',
    "nItemProd" => '',
    "nFCI" => ''
];

foreach ($ap as $produto) {

    $std = new stdClass();

    $std->item = $produto ['nItem'];
    $std->produto = $produto ['cProd'];
    $std->cean = $produto['cEan'];
    $std->produto = $produto['xProd'];
    $std->ncm = $produto['NCM'];
    $std->nve = $produto['NVE'];
    $std->cest = $produto['CEST'];
    $std->exitipi = $produto['EXITIPI'];
    $std->cfop = $produto['CFOP'];
    $std->ucom = $produto['uCom'];
    $std->qcom = $produto['qCom'];
    $std->vuncom = $produto['vUnCom'];
    $std->vprod = $produto['vProd'];
    $std->ceantrin = $produto['cEANTrib'];
    $std->utrib = $produto['uTrib'];
    $std->qtrib = $produto['qTrib'];
    $std->vuntriv = $produto['vUnTrib'];
    $std->vfrete = $produto['vFrete'];
    $std->vseg = $produto['vSeg'];
    $std->vdesc = $produto['vDesc'];
    $std->voutro = $produto['vOutro'];
    $std->vtotal = $produto['indTot'];
    $std->xpedido = $produto['xPed'];
    $std->nitemprod = $produto['nItemProd'];
    $std->nfci = $produto['nFCI'];
}

$nfe->tagprod($std);
unset($std);
//------------------------------------------
//Imposto sobre circulação de mercadoria---------

$std = new StdClass();
$std->item = 1;
$std->orig = '0';
$std->CSOSN = '102';
$std->modBC = '3';
$std->pRedBC = '';
$std->vBC = '5000,00';
$std->pICMS = '0';
$std->vICMS = '0';
$std->vICMSDeson = '';
$std->motDesICMS = '';
$std->modBCST = '';
$std->vBCST = '';
$std->pICMSST = '';
$std->vICMSST = '';
$std->pDif = '';
$std->vICMSDif = '';
$std->vICMSOp = '';
$std->vBCSTRet = '';
$std->vICMSSTRet = '';

$nfe->tagICMSSN($std);
unset($std);
//------------------------------------------
//PIS---------------------------------------

$std = new StdClass();
$std->item = 1;
$std->CST = '07';
$std->vBC = '';
$std->pPIS = '';
$std->vPIS = '0.00';
$std->qBCProd = '0.00';
$std->vAliqProd = '0.000';
$nfe->tagPIS($std);
unset($std);
//---------------------------------------------
//COFINS---------------------------------------

$std = new StdClass();
$std->item = 1;
$std->CST = '07';
$std->vBC = '';
$std->pCofins = '';
$std->vCofins = '0.00';
$std->qBCProd = '0.00';
$std->vAliqProd = '0.000';
$nfe->tagCOFINS($std);
unset($std);
//-------------------------------------------------
//Tag imposto---------------------------------------

$std = new StdClass();
$std->item = 1;
$std->vTotTrib = '0';
$nfe->tagimposto($std);
unset($std);
//-------------------------------------------------
//Iniciar variaveis não iniciadas------------------------

$std = new StdClass();
$std->vII = isset($vII) ? $vII : 0;
$std->vIPI = isset($vIPI) ? $vIPI : 0;
$std->vIOF = isset($vIOF) ? $vIOF : 0;
$std->vPIS = isset($vPIS) ? $vPIS : 0;
$std->vCOFINS = isset($vCOFINS) ? $vCOFINS : 0;
$std->vICMS = isset($vICMS) ? $vICMS : 0;
$std->vBCST = isset($vBCST) ? $vBCST : 0;
$std->vST = isset($vST) ? $vST : 0;
$std->vISS = isset($vISS) ? $vISS : 0;
$std->vBC = '0.00';
$std->vICMS = '0.00';
$std->vICMSDeson = '0.00';
$std->vBCST = '0.00';
$std->vST = '0.00';
$std->vProd = '3000.00';
$std->vFrete = '0.00';
$std->vSeg = '0.00';
$std->vDesc = '0.00';
$std->vII = '0.00';
$std->vIPI = '0.00';
$std->vPIS = '0.00';
$std->vCOFINS = '0.00';
$std->vOutro = '0.00';
$vNF = number_format($std->vProd - $std->vDesc - $std->vICMSDeson + $std->vST + $std->vFrete + $std->vSeg = $std->vOutro + $std->vII + $std->vIPI, 2, '.', '');
$vTotTrib = number_format($std->vICMS = $std->vST + $std->vII + $std->vIPI + $std->vPIS + $std->vCOFINS + $std->vIOF + $std->vISS, 2, '.', '');
$nfe->tagICMSTot($std);
//-----------------------------------------------------------------------------------
//Calculo da carga tributaria similar ao IBPT - lei 12.741/12 -------------------------------
$federal = number_format($std->vII + $std->vIPI + $std->vIOF + $std->vPIS + $std->vCOFINS, 2, ',', '.');
$estadual = number_format($std->vICMS + $std->vST, 2, ',', '.');
$municipal = number_format($std->vISS, 2, ',', '.');
$totalT = number_format((($std->vII + $std->vIPI + $std->vIOF + $std->vPIS + $std->vCOFINS) + ($std->vICMS + $std->vST)), 2, ',', '.');
$textoIBPT = "Valor Aprox. Tributos R$ {$totalT} - {$federal}Federal, {$estadual}Estadual e {$municipal}Municipal.";
unset($std);
//--------------------------------------
//Informações adicionais-------------------

$std = new StdClass();
$std->infAdFisco = "";
$stdinfCpl - "Pedido N16 - {$textoIBPT}";
$nfe->taginfAdic($std);
unset($std);
//--------------------------------------
//Preenche informações do frete------------

$std = new StdClass();
$std->modFrete = '9';
$nfe->tagTransp($std);
//-----------------------------------------

$resp = $nfe->montaNFe();

if ($resp) {

    $xml = $nfe->getXML();

    $filename = "../NF-e/NF-e_emitidas/gerados/{$chave}.xml";
    file_put_contents($filename, $xml);
    chmod($filename, 0777);

    $query = "INSERT INTO nfec (nota, chave) VALUES ('1', :chave)";
    $stmt = Connection::Connectar()->prepare($query);
    $stmt->bindParam("chave", $chave);
    $stmt->execute();

    header('Content-type:text/xml; charset =UTF-8');
    echo $xml;
} else {
    header('Content-type:text/html; charset =UTF-8');
}