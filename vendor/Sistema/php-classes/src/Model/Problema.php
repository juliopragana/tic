<?php
namespace Sistema\Model;
use \Sistema\DB\Sql;
use \Sistema\Model;

class Problema extends Model{

    public static function listProb(){
        $sql = new Sql();
        
        return $sql->select('SELECT * FROM tb_problema');
    }

}


?>