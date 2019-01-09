<?php 

session_start();


require_once("vendor/autoload.php");

use \Slim\Slim;
use \Sistema\Page;
use \Sistema\PageAdmin;
use \Sistema\Model\User;  

$app = new Slim();

$app->config('debug', true);

//rota raiz
$app->get('/', function() {

    User::verificaSessao();

    $page = new Page([
        "header"=>false,
        "footer"=>false
    ]);
    
    $page->setTpl("login");
    
});

$app->get('/admin', function(){
    
    User::verificaLogin();

    $page = new PageAdmin();
    

    $page->setTpl("index");
}); 

$app->post('/login', function(){

    User::login($_POST["login"],$_POST["senha"]);

    header("location: /admin");
    exit;   

});

$app->get('/admin/teste', function(){
    
    User::verificaLogin();

    $page = new PageAdmin([
        "header"=>false,
        "footer"=>false
    ]);

    $sessao = array(
        "idalu"=> "1",
        "username" => "Julio Pragana"
    );
    
    $page->setTpl("teste", array(
        "sessao"=>$sessao
    ));

}); 

$app->get('/admin/logout',function(){

    User::logout();

    header("Location: /");
    exit;
});






$app->run();

