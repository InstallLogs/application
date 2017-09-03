<?php
namespace Application\Model\Factory\Controller;

use Application\Controller\Index as IndexController;
use Application\Model\Service\Line as LineService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Index implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new IndexController(
            $container->get(LineService::class)
        );
    }
}
