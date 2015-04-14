<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Dev;

class DevController extends AbstractActionController
{
    public function indexAction()
    {	
		$test = new Dev();
		echo $test->getID();
		echo '<br />';
		//die('xxx');
        return new ViewModel();
    }

	public function testAction()
	{
		die('xxx');
	}
}
