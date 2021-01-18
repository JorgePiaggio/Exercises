<?php

namespace Model;

class User{

    private $email;
    private $password;

    public function _construct (){}

    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;}
    public function setEmail($email){$this->email=$email;}
    public function setPassword($password){$this->password=$password;}

}
?>
