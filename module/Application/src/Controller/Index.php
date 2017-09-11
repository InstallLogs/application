<?php
namespace Application\Controller;

use Application\Model\Service\Line as LineService;
use Zend\Mvc\Controller\AbstractActionController;

class Index extends AbstractActionController
{
    public function __construct(LineService $lineService)
    {
        $this->lineService = $lineService;
    }

    public function indexAction()
    {
        return [
            'newestLines' => $this->lineService->getNewestLines(),
        ];
    }
}
