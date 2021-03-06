<?php
require('autoload.php ');

$metaCharset = new Meta("UTF-8");
$metaHttEquiv = new Meta(null, null, "X-UA-Compatible", "IE=edge");
$metaName = new Meta(null, "viewport", null, "width=device-width, initial-scale=1.0");

$title = new Title("Minha Página");

$linkBootstrap = new LinkCss("https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css","stylesheet", "sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl","anonymous");

$head = new Head();
$head->addElement($metaCharset);
$head->addElement($metaHttEquiv);
$head->addElement($metaName);
$head->addElement($linkBootstrap);
$head->addElement($title);

$body = new Body("body");

$container = new Div("container");

$barra = new Div("row");
$conteudoBarra = new Div("col bg-primary");
$texto = new Texto("olá mundo");
$conteudoBarra->addElement($texto);
$barra->addElement($conteudoBarra);

$areaprincipal = new Div("row");
$menu = new Div("col-sm-2");
//$menu->addElement($texto);

//Funcao para facilitar a visualizacao do var_dump para vias de debug
function dd($a) {
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
    //die();  serve para apagar tudo oque vier depois desta funcao
}

//itens do menu 
$menuConteudo = new Ul("list-group");
$menuConteudo->addElement(new li("list-group-item", "Pessoas"),
new li("list-group-item", "Produtos"),
new li("list-group-item", "Contas"),
new li("list-group-item", "Créditos"),
new li("list-group-item", "Débitos"));
$menu->addElement($menuConteudo);

$miolo = new Div("col-sm-10 bg-danger");
$miolo->addElement($texto);

$areaprincipal->addElement($menu);
$areaprincipal->addElement($miolo);

$container->addElement($barra);
$container->addElement($areaprincipal);

$body->addElement($container);

$html = new Html("pt-br", $head, $body);

$conn = new Conexao();
$conn->getConn();
$body->addElement(dd($conn->getSelect("SELECT * FROM menu")));


echo $html;
?>
