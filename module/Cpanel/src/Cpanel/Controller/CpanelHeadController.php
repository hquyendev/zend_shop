<?php

namespace Cpanel\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class CpanelHeadController extends AbstractActionController {


    public function onDispatch(\Zend\Mvc\MvcEvent $e)
	{
		$user_session = new Container('A_Login');
	    if (!$user_session->email || !$user_session->username) {
	    	return $this->redirect()->toUrl('cpanel/login');;
	    	exit();
	    }
	    return parent::onDispatch($e);
	}


}