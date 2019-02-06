<?php 

session_start();


require_once("vendor/autoload.php");

use \Slim\Slim;
use \Sistema\Page;
use \Sistema\PageAdmin;
use \Sistema\Model\User;  
use \Sistema\Model\Emprestimo; 
use \Sistema\Model\Area;

$app = new Slim();

$app->config('debug', true);

# ########################################## ADMIN ########################################### #

//rota raiz
$app->get('/', function() {

    User::verificaSessao();

    $page = new PageAdmin([
        "header"=>false,
        "footer"=>false
    ]);
    
    $page->setTpl("user/login");
    
});

$app->post('/login', function(){

    User::login($_POST["login"],$_POST["senha"]);

    header("location: /admin");
    exit;   

});

$app->get('/admin', function(){
    
    User::verificaLogin();
    
    $emps = Emprestimo::listAll();

    $page = new PageAdmin();
    

    $page->setTpl("index", array(
        "emps"=>$emps
    ));
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

################################# ################################## ##########################################
#################################                USER                ##########################################
###############################################################################################################

$app->get('/admin/usuarios', function(){
    User::verificaLogin();

    $users = User::listAll();

    $page = new PageAdmin();

    $page->setTpl("usuarios", array(
        "users"=>$users
    ));

});

$app->get('/admin/cadastro-usuario', function(){
    User::verificaLogin();

    $page = new PageAdmin();

    $page->setTpl("cadastro-usuario");

});

$app->post('/admin/cadastro-usuario', function(){
    User::verificaLogin();

    $user = new User();

    $_POST["status_user"] = (isset($_POST["inadmin"])) ?1:0;

    $user->setData($_POST);
    
    $user->save();

    header("Location: /admin/usuarios");
    
});

################################# Areas ###################################################


$app->get('/areas', function(){
    User::verificaLogin();
    
    $page = new PageAdmin();
    $areas = Area::listArea();
    $page->setTpl("areas", array(
        "areas"=>$areas
    ));

});

$app->get('/abrir-chamado', function(){

    User::verificaLogin();

    $page = new PageAdmin();

    $areas = Area::listArea();

    $page->setTpl("abrir-chamado", array(
        "areas"=>$areas
    ));

});





$app->get('/home', function(){

    User::verificaLogin();

    $page = new Page();

    $page->setTpl("user/index");
});


$app->run();

