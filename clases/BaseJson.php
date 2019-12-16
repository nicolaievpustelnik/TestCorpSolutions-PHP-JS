<?php
    class BaseJson extends BaseDeDato{
        private $baseJson;

        public function __construct($baseJson){
            $this->baseJson = $baseJson;
        }
        public function getBaseJson(){
            return $this->baseJson;
        }
        public function setBaseJson(){
            return $this->baseJson = $baseJson;
        }
        
        // FUNCION DE ID PARA CADA USUARIO
       public function nextId(){
            $json = file_get_contents($this->getBaseJson());
            $usuarios = json_decode($json,true);
            $ultimoUsuario = array_pop($usuarios['usuarios']);
            $ultimoId = $ultimoUsuario['id'];
            if($ultimoId != 0){
                return $ultimoId + 1;
            }else{
                return 1;
            }
        }

        public function crear($usuario){
            $array = [
                "id"       => $this->nextId(),
                "userName" => $usuario->getUserName(),
                "email"    => $usuario->getEmail(),
                "password" =>password_hash($usuario->getPassword(),PASSWORD_DEFAULT),
                "ciudadFavorita" => $usuario->getCiudadFavorita(),
            ];
             $json = file_get_contents($this->getBaseJson());
            $usuarios = json_decode($json,true);
            $usuarios["usuarios"][] = $array;
            $json = json_encode($usuarios,JSON_PRETTY_PRINT);
            file_put_contents($this->getBaseJson(),$json);
        }

        
        // FUNCION PARA IMPRIMIR DATOS ANTERIORES QUE PASARON VALIDACION
        public function reincidencia($campo){
            if($_POST){
                if(!isset($errores[$campo])){
                    echo $_POST[$campo];                        
                } 
            }
        }





    }





?>