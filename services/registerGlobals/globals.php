<?php 
$DataMap = new Cartao\services\registerGlobals\DataMap();

define('DB_HOST', '192.168.0.198');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda');
define('DB_PASS', 'agenda');

//$arrayDatabaseInfo = array(
//    'bd'=>'agenda',
//    'host' => '192.168.0.198',
//    'user' => 'agenda',
//    'pass' => 'agenda'
//);



$pathHTML = 'views/html/%s';
$arrayPathHTMLFiles = array(
    'home',
    'header',
    'footer',
    'signUpPage',
    'erroMessage',
    'editePage'
);

$pathCSS = 'views/css/%s';
$arrayPathCSSFiles = array(
    'editOnPage',
    'style'
);

$pathJS = 'views/js/%s';
$arrayPathJSFiles = array(
    'configJeditable',
    'editOnPage',
    'jQuery',
    'jeditable',
    'scripts',
);

$arrayTitle = array(
    'default' => 'Default',
    'error' => 'Personare - Error',
    'home' => 'Personare - Homepage',
    'edit' => 'Personare - Editar',
    'signUp' => 'Personare - Cadastro'
);

$arraySystemMessages = array(
    'registratioFailed' => "Por favor tente novamente! Ocorreu algum erro durante o cadastro!",
    'registrationSucess' => 'Cadastro realizado com sucesso!',
    'fieldIncomplete' => 'Preencha todos os campos!',
    'dataExclusionSucess' => 'Os dados foram excluidos com sucesso! Total de linhas: ',
    'dataExclusionFailed' => 'Nem todos os dados foram excluidos com sucesso!'
);

$varPOST = array(
    "default",
    "txtMensagem",
    "txtNomeRemetente",
    "txtEmailRemetente",
    "txtNomeDestinatario",
    "txtEmailDestinatario",
    "selectDia",
    "selectMes",
    "selectAno",
    "btnEnviar",
    "arrayExcluir"
);

$varGET = array(
    "action",
    "cadastrar",
    "cadastrarCartoes",
    "excluirMensagens"
);

$DataMap->addHTMLFile($pathHTML, $arrayPathHTMLFiles);
$DataMap->addCSSFile($pathCSS, $arrayPathCSSFiles);
$DataMap->addJSLFile($pathJS, $arrayPathJSFiles);
$DataMap->addTitle($arrayTitle);
$DataMap->addSystemMessage($arraySystemMessages);
$DataMap->addVarGET($varGET);
$DataMap->addVarPOST($varPOST);


//var_dump();
//var_dump($DataMap->get('post', 'txtMensagem'));
//echo '<br/>';
//echo '<br/>';
//var_dump($DataMap->post);
//echo '<br/>';
//echo '<br/>';
//var_dump($DataMap->get);
//echo '<br/>';
//echo '<br/>';
//var_dump($_POST['txtMensagem']);