<?php 

session_start();


require_once("vendor/autoload.php");
date_default_timezone_set('America/Cayenne');


use \Slim\Slim;
use \Sistema\Page;
use \Sistema\PageAdmin;
use \Sistema\Model\User;  
use \Sistema\Model\Emprestimo; 
use \Sistema\Model\Area;
use \Sistema\Model\Baseline;
// use Sistema\graphsdk\src\Facebook\Facebook;



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
    
    $fb = new Facebook\Facebook([
        'app_id' => '387405068729135',
        'app_secret' => 'd571c1cc7c4f5c8f0d6024cfeedeb310',
        'default_graph_version' => 'v2.10'
    
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email']; // Optional permissions
    $loginUrl = $helper->getLoginUrl('http://dev.tic.com.br/login-facebook', $permissions);    
          
    
    $page->setTpl("user/login", [
        'error'=>User::getError(),
        'loginUrl'=>$loginUrl
    ]);
    

});

$app->post('/login', function(){

    try{
        User::login($_POST["login"],$_POST["senha"]);
        header("location: /admin");
        exit();
    }catch(Exception $e){
        User::setError('Usuário ou senha inválidos');
        header("location: /");
        exit();
    }
    

});

################ Login Facebook ####################
$app->get('/login-facebook', function(){

    $fb = new Facebook\Facebook([
    'app_id' => '387405068729135',
    'app_secret' => 'd571c1cc7c4f5c8f0d6024cfeedeb310',
    'default_graph_version' => 'v2.10'

    ]);
    
    $helper = $fb->getRedirectLoginHelper();
   
    try {
        $accessToken = $helper->getAccessToken();
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      if (! isset($accessToken)) {
        if ($helper->getError()) {
          header('HTTP/1.0 401 Unauthorized');
          echo "Error: " . $helper->getError() . "\n";
          echo "Error Code: " . $helper->getErrorCode() . "\n";
          echo "Error Reason: " . $helper->getErrorReason() . "\n";
          echo "Error Description: " . $helper->getErrorDescription() . "\n";
        } else {
          header('HTTP/1.0 400 Bad Request');
          echo 'Bad request';
        }
        exit;
      }

      // Logged in
echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
echo '<h3>Metadata</h3>';
var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('{app-id}'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    exit;
  }

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}

$_SESSION['fb_access_token'] = (string) $accessToken;

// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');

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
        "users"=>$users,
        'success'=>User::getSuccess()
    ));

});

$app->get('/admin/cadastro-usuario', function(){
    User::verificaLogin();

    $page = new PageAdmin();

    $page->setTpl("cadastro-usuario", array(
        'error'=>User::getError(),
        
     ));

});

$app->post('/admin/cadastro-usuario', function(){
    User::verificaLogin();

    $imagemDefault = 'res/img/avatar/default.png';

    $user = new User();

    $_POST["status_user"] = (isset($_POST["status_user"])) ?1:0;
   
    $dt = date('d/m/Y H:i:s', time());

    $_POST["dataregistro"] = $dt;
 
    $password = password_hash($_POST["senha"], PASSWORD_DEFAULT, [
        'cost'=>12
    ]);

    $_POST["senha"] = $password;

    $file = $_FILES["image"];

    $dirUpload = "res/img/avatar";


    if(!$file["name"] == ''){
        

        if($file["error"] && $file === NULL){
            User::setError('Não foi possível carregar a imagem.');  
            header("Location: /admin/cadastro-usuario");
            exit();
        }

        if(!isset($dirUpload)){
            mkdir($dirUpload);
        };
        
        if(!move_uploaded_file($file["tmp_name"], $dirUpload . DIRECTORY_SEPARATOR . $file["name"])){
            User::setError('Erro ao salvar imagem');  
            header("Location: /admin/cadastro-usuario");
            exit();
        } 

        $_POST["image"] = '/'.$dirUpload. '/'. $file["name"];

    } else {

        $_POST["image"] = '/'.$imagemDefault;

    }
    
    
    $user->setData($_POST);

    try{
        $user->save();
        User::setSuccess('Usuário cadastrado com sucesso');
        header("Location: /admin/usuarios");
        exit();
    } catch(Exception $e){
        User::setError('Não foi possível cadastrar o usuário, devido ao erro: ' .$e->getMessage());
        header("Location: /admin/cadastro-usuario");
        exit();
    }
    
          
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


############################ BASELINE ############################3
$app->get('/atualizar-baseline', function(){

    User::verificaLogin();

    $page = new PageAdmin();

    $page->setTpl("atualizar-baseline");

});

$app->post('/atualizar-baseline', function(){

    User::verificaLogin();
    
    Baseline::importArqXML($_FILES["arquivo"]);
});


$app->run();

