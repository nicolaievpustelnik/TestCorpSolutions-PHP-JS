<?php 
class Validador{
    public function validarDatos($usuario){
        $errores = [];
    
        // VALIDAR USER NAME
        $userName=$usuario->getUserName();
        $email =$usuario->getEmail();
        if(strlen($usuario->getUserName())==0){
            $errores["userName"] = "No puedes dejar el campo vacio";
        }else if(!ctype_alpha($usuario->getUserName())){
            $errores["userName"] = "No puedes usar numeros o caracteres especiales";
        }
        // PARA QUE NO EXISTA EL MISMO USER
        if(BaseSQL::buscar("usuarios","userName","'$userName'")!=NULL){
            $errores['userName'] = "Este nombre de usuario ya se encuentra ocupado";
        }
        //validacion del email 
        if(strlen($usuario->getEmail()) == 0){
            $errores["email"] = "No puedes dejar este campo vacio"; 
        }else if(!filter_var($usuario->getEmail(),FILTER_VALIDATE_EMAIL)){
            $errores["email"]= "Email invalido";
        }
    
        // VERIFICAR SI YA EXISTE EL MAIL EN LA BASE DE DATOS 
        if(BaseSQL::buscar('usuarios','email',"'$email'")!=NULL){
            $errores["email"] = "El email ya se encuentra registrado en otra cuenta ";
        }
    
        // VALIDAR PASSWORD
        if(strlen($usuario->getPassword() == 0)){
            $errores["password"] = "No puedes dejar este campo vacio";
        } else if(strlen($usuario->getPassword()) <6){
            $errores["password"] = "la contraseña debe de tener mas de 6 caracteres";
        } else if(!is_numeric($usuario->getPassword())){
            $errores["password"] = "La contraseña solo puede contener caracteres numericos";
        }
    
        // VALIDAR COMFIRMACION DE PASSWORD
        if(strlen($usuario->getPasswordRepeat()) == 0){
            $errores["passwordRepeat"] = "No puedes dejar este campo vacio";
        }else if($usuario->getPasswordRepeat() != $usuario->getPassword()){
            $errores["passwordRepeat"] = "La contraseña no coincide"; 
        }


        return $errores;
    }

    

}

?>