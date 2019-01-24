<?php

namespace Sistema\Model;
use \Sistema\DB\Sql;
use \Sistema\Model;

class Equipamento extends Model{


    public static function listAll(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_equipamentos ORDER BY id_equipamento DESC");
    }

    public static function qtdEquipamento(){
        $equipamentos = new Esquipamento();
        Equipamento::listAll();

    }   





}

?>