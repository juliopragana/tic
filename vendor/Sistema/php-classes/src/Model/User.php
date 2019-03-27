<?php
namespace Sistema\Model;

use \Sistema\DB\Sql;
use \Sistema\Model;
use DateTime;

class User extends Model{   


    const SESSION = "User";
    const ERROR = "UserError";
    const SUCCESS = "UserSucesss";
    
########################### LOGIN ############################

#################### LOGIN

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

    #################### CRUD ######################################

    ################## LISTAR

    public static function listAll(){
        
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_user ORDER BY username ASC");
    }

    ################ SALVAR 

    public function save(){
        $sql = new Sql();

        $results = $sql->select("CALL sp_user_save(:username, :email, :senha, :dataregistro, :status_user, :image)", array(
                ":username"=>$this->getusername(),
                ":email"=>$this->getemail(),
                ":senha"=>$this->getsenha(),
                ":dataregistro"=>$this->getdataregistro(),
                ":status_user"=>$this->getstatus_user(),
                ":image"=>$this->getimage()
        ));
        
        if($results === 0) return $error = User::setError();

        $this->setData($results[0]);
           
    }
    ######################### SESSÃO ########################

    #################### VERIFICA SE O USUÁRIO ESTÁ LOGADO

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

    #################### VERIFICA SE EXISTE SESSÃO

    public static function verificaSessao(){
        if(isset($_SESSION[User::SESSION])){
            header("Location: /admin");
            exit;
        }
    }

    #################### FAZ LOGOF

    public static function logout(){
        $_SESSION[User::SESSION] = NULL;
    }


    ######################################### ERROS ###################################################

    public static function setError($msg){
       
        $_SESSION[User::ERROR] = $msg;
    }

    public static function getError(){
        
        $msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

        user::clearError();

        return $msg;

    }

    public static function clearError(){
        
        $_SESSION[User::ERROR] = NULL;
    }

    ######################################## SUCCESS ####################################################
    public static function setSuccess($msg = array()){
       
        $_SESSION[User::SUCCESS] = $msg;
    }

    public static function getSuccess(){
        
        $msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

        user::clearError();

        return $msg;

    }

    public static function clearSuccess(){
        
        $_SESSION[User::SUCCESS] = NULL;
    }

}

?>