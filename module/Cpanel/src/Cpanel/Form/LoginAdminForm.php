<?php
namespace Cpanel\Form;
use Zend\Form\Form;
 
class LoginAdminForm extends Form
{
    public function __construct($name = null)
    {
        //Đặt tên cho form
        parent::__construct('loginForm');
        parent::setAttribute('action','login');
        parent::setAttribute('method','post');
        parent::setAttribute('class','form-signin');
        
        //Thêm trường(input) id
        //type Hidden
        $this->add(array(
            'name' => 'username',
            'type' => 'text',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Username'
            ),
         ));
 
        //Thêm trường(input) title
        //type text
        //label Tiêu đề
        $this->add(array(
            'name'      => 'password',
            'type'      => 'password',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Username'
            ),
        ));
 
        //Thêm nút submit
        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'Đăng nhập',
                'id' => 'submitLoginFormAdmin',
                'class'=> 'btn btn-lg btn-login btn-block'
            ),
        ));
    }
}