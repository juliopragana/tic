<?php
namespace Sistema\Model;
use \Sistema\DB\Sql;
use \Sistema\Model;

class Emprestimo extends Model{

    public static function listAll(){
        $sql = new Sql();

        return $sql->select("SELECT b.nome, b.unidade, b.setor, b.funcao, b.email, b.telefone, b.skype, b.ramal, c.tipo, c.marca, c.modelo, c.configuracao, c.tombo, c.status_equipamento, a.num_chamado, a.data_entrega, a.data_receber, a.status_emprestimo FROM tb_emprestimo a INNER JOIN tb_funcionarios b INNER JOIN tb_equipamentos c WHERE a.id_funcionario = b.id_funcionario AND a.id_equipamento = c.id_equipamento ORDER BY a.data_receber ASC;");

    }



}

?>