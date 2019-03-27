<?php
namespace Sistema\Model;

use \Sistema\DB\Sql;
use \Sistema\Model;
use DOMDocument;



class Baseline extends Model {

    public static function importArqCVS($arq){

       $file = $arq;
       
       if($file["error"]){
           throw new Exception("Error: " .$file["error"]);
       }

       $dirUploads = "uploads";

       if(!is_dir($dirUploads)){
           mkdir($dirUploads);
       }

       if(move_uploaded_file($file["tmp_name"], $dirUploads .DIRECTORY_SEPARATOR.$file["name"])){

        $dados = $dirUploads.DIRECTORY_SEPARATOR.$file["name"];

        Baseline::lendoArqCVS($dados);

       } else {
           throw new Exception("Não foi possível fazer o upload");
       }

    }

    public static function lendoArqCVS($dados){

        $filename = $dados;

        $lista = array();

       
        if(file_exists($filename)){
            
            $file = fopen($filename, "r");

            $headers = explode(",", fgets($file));

            $data = array();

            while($row = fgets($file)){

                
                $rowData = explode(",", $row);

                $linha = array();

                for($i = 0; $i < count($headers); $i++){
                   
                    
                $linha[$headers[$i]] = $rowData[$i];

                }

                array_push($data, $linha);

                // Baseline::saveBase($data);

                

                 
            }
            
            fclose($file);

            var_dump($data);

            // try{
            //     Baseline::saveBase($data); 

            //     echo "Deu certo";
            // } catch(PDOException $e){
            //     throw new Exception("Error". $e->getMessage());
                
            // }
                         
                      
        }

    }

    public static function saveBaseCVS($lista = array()){
           
            $sql = new Sql();
            $cont = 0;

            for($i = 0; $i < count($lista); $i++){

                $results = $sql->select("SELECT * FROM tb_baseline_teste WHERE id_usuario = :idusuario", array(
                    ":idusuario"=>$lista[$i]["﻿idusuario"]
                ));
                
                if(count($results) === 0){

                    $sql->query("INSERT INTO tb_baseline_teste (id_usuario, deslogin, dessenha, data_cadastro) VALUES(:idusuario, :Deslogin, :Dessenha, :Dtcadastro )", array(
                        ":idusuario"=>$lista[$i]["﻿idusuario"],
                        ":Deslogin"=>$lista[$i]["login"],
                        ":Dessenha"=>$lista[$i]["senha"],
                        ":Dtcadastro"=>$lista[$i]["data"]
                    ));

                    $cont = $cont +1;
                }
            } 
            
            echo "Foram atualizados ".$cont." Registors <br>";
            
    }

    public static function importArqXML($dado){

       
        $arquivo = new DOMDocument();
        $arquivo->load($dado['tmp_name']);
        $column = array();
        // var_dump($arquivo);
        $linhas = $arquivo->getElementsByTagName("Row");
                
        foreach($linhas as $linha){
            $id = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
            echo "Id Usuário: $id <br>"; 
            echo "<hr>";
        }     

    }


}

?>