<?php
namespace Sistema\Model;
use \Sistema\DB\Sql;
use \Sistema\Model;

class Area extends Model {

    public static function listArea(){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_area");

    }




}



?>