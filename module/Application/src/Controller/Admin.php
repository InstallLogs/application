<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Admin extends AbstractActionController
{
    public function indexAction()
    {
    }

    public function addLogAction()
    {
        if (!empty($_POST)) {
            return $this->addLogPostAction();
        }
    }

    private function addLogPostAction()
    {
        return $this->redirect()
            ->toRoute('admin', ['action' => 'add-log'])
            ->setStatusCode(303);
    }
}
