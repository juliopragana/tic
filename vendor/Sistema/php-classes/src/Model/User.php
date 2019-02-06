<?php
namespace Sistema\Model;

use \Sistema\DB\Sql;
use \Sistema\Model;
use DateTime;

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

    public static function listAll(){
        
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_user ORDER BY username ASC");
    }

    public function save(){
        $sql = new Sql();
        date_default_timezone_set('America/Cayenne');
        $dt = new DateTime();
        $dt->format("d/m/Y H:i:s");

        $results = $sql->select("CALL sp_user_save(:username, :email, :senha, :dataregistro, :status_user)", array(
                ":username"=>$this->getusername(),
                ":email"=>$this->getemail(),
                ":senha"=>$this->getsenha(),
                ":dataregistro"=>$dt,
                ":status_user"=>$this->getstaus_user()
        ));

        $this->setData($results[0]);
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