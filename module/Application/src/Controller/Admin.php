<?php
namespace Application\Controller;

use Application\Model\Service\Log as LogService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Admin extends AbstractActionController
{
    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

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
        $this->logService->insertLog($_POST['log']);

        return $this->redirect()
            ->toRoute('admin', ['action' => 'add-log'])
            ->setStatusCode(303);
    }
}
