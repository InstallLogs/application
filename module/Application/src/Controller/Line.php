<?php
namespace Application\Controller;

use Application\Model\Factory\Model\Entity\Line as LineEntityFactory;
use Application\Model\Service\Log as LogService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Line extends AbstractActionController
{
    public function __construct(LineEntityFactory $lineEntityFactory)
    {
        $this->lineEntityFactory = $lineEntityFactory;
    }

    public function indexAction()
    {
    }
}
