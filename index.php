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
    
    $user = "julio Pragana";
    
    $page->setTpl("index", array());
}); 

$app->post('/login', function(){

    User::login($_POST["login"],$_POST["senha"]);

    

    header("location: /admin");
    exit;   

});

$app->get('/admin/logout',function(){

    User::logout();

    header("Location: /");
    exit;
});




$app->run();

