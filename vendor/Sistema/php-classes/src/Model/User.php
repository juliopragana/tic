<?php
namespace Sistema\Model;

use \Sistema\DB\Sql;
use \Sistema\Model;

class User extends Model{   

    const SESSION = "User";

    public static function login($login, $senha){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_user WHERE username = :LOGIN", array(
            ":LOGIN"=>$login
        ));

        if (count($results) === 0){
            
            throw new \Exception("Usuário inválido");
            
        }

        $data = $results[0];

        if(password_verify($senha, $data["senha"]) === true){
        
            $user = new User();

            $user->setData($data);

            $_SESSION[User::SESSION] = $user->getValues();

            return $user;

        } else {
            throw new \Exception("Senha inválida");
            
        }

    }

    public static function verificaLogin(){
        if(
            !isset($_SESSION[User::SESSION])
            || 
            !$_SESSION[User::SESSION]
            ||
            !(int)$_SESSION[User::SESSION]["id_user"] > 0
        ) {
            header("Location: /");
            exit;
        }
    }

    public static function verificaSessao(){
        if(isset($_SESSION[User::SESSION])){
            header("Location: /admin");
            exit;
        }
    }

    public static function logout(){
        $_SESSION[User::SESSION] = NULL;
    }

}

?>