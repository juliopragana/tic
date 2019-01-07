<?php
namespace Sistema;

Class Model{

    public function __call($name, $args){

        $method = substr($name, 0, 3);
        $fiedName = substr($name, 3, strlen($name));
        
        switch($method){
            case "get":
                return (isset($this->values[$fiedName])) ? $this->values[$fiedName] : NULL;
            break;
            case "set":
                $this->values[$fiedName] = $args[0];
            break;
        }
    }

    public function setData($data = array()){
        
        foreach ($data as $key => $value) {
            # code...
            $this->{"set".$key}($value);
        }
    }

    public function getValues(){
        return $this->values;
    }
}



?>