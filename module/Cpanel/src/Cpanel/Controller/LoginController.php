<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cpanel\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cpanel\Model\Admin;
use Zend\Session\Container;


class LoginController extends AbstractActionController
{
    protected $adminTable;
    

    public function indexAction()
    {
        $user_session = new Container('A_Login');
        $user_session->getManager()->getStorage()->clear();
        $submit = array();
        if($this->getRequest()->getPost('submit'))
        {
            $username = $this->getRequest()->getPost('username');
            $password = $this->getRequest()->getPost('password');
            $row = $this->getAdminTable()->loginAdmin(array('username'=>$username,'password'=>$password));
            if($row AND $row->id)
            {
                $user_session->username = $row->username;
                $user_session->email = $row->email;

                return $this->redirect()->toRoute('cpanel');
            }else
            {
                $submit = array('message' => 'Thông tin đăng nhập không chính xác');
            }
        }

        $viewModel = new ViewModel($submit);
        $viewModel->setTerminal(true);
        return $viewModel;
    }
    public function loginAction()
    {
        return new viewModel;
    }


    public function getAdminTable()
     {
         if (!$this->adminTable) {
             $sm = $this->getServiceLocator();
             $this->adminTable = $sm->get('Cpanel\Model\AdminTable');
         }
         return $this->adminTable;
     }
}
