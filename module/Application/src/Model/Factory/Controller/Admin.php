<?php
namespace Application\Model\Factory\Controller;

use Application\Controller\Admin as AdminController;
use Application\Model\Service\Log as LogService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Admin implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new AdminController(
            $container->get(LogService::class)
        );
    }
}
