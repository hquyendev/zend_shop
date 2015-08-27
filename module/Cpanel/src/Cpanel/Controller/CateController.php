<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cpanel\Controller;

use Zend\View\Model\ViewModel;

class CateController extends CpanelHeadController
{
    public function indexAction()
    {
        return new ViewModel;
    }
    public function addAction()
    {
        return new ViewModel;
    }
}
