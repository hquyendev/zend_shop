<?php
class Form_LoginAdmin extends Zend_Form{
    public function init(){
        $this->setAction('')->setMethod('post');
        $username=$this->createElement("text","username",array(
            "placeholder" => "Username",
            "size" => "40", 
            ));
        $password=$this->createElement("text","password",array(
            "placeholder" => "Password",
            "size"  => "40", 
            ));    
        $submit=$this->createElement("submit","Đăng nhập");        
        $this->addElements(array($username,$password,$submit));
    }
}