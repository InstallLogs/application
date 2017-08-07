<?php
namespace Application\Model\Factory\Controller;

use Application\Controller\Admin as AdminController;
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
        );
    }
}
