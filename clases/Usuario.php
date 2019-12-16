<?php
class Usuario{
    public function __construct($userName,$email,$password,$passwordRepeat,$ciudadFavorita){
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->ciudadFavorita = $ciudadFavorita;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getPasswordRepeat(){
        return $this->passwordRepeat;
    }
    public function getCiudadFavorita(){
        return $this->ciudadFavorita;
    }

    public function setUserName($userName){
        return $this->userName = $userName;
    }
    public function setEmail($email){
        return $this->email = $email;
    }
    public function setPassword($password){
        return $this->password = $password;
    }
    public function setPasswordRepeat($passwordRepeat){
        return $this->passwordRepeat = $passwordRepeat;
    }
    public function setCiudadFavorita($ciudadFavorita){
        return $this->ciudadFavorita = $ciudadFavorita;
    }

    public function create($bd){
        $sql ='INSERT INTO usuarios(userName,email,password,ciudadFavorita) VALUES (:userName,:email,:password,:ciudadFavorita)';
        $query = $bd->prepare($sql);
        $query->bindValue(':userName',$this->getUserName());
        $query->bindValue(':email',$this->getEmail());
        $query->bindValue(':password',password_hash($this->getPassword(),PASSWORD_DEFAULT));
        $query->bindValue(':ciudadFavorita',$this->getCiudadFavorita());
        $query->execute();
        header('Location:inicio.php');
    }
    
}




?>