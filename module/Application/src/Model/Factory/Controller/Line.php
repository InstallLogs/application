<?php
namespace Application\Model\Factory\Controller;

use Application\Controller\Line as LineController;
use Application\Model\Factory\Model\Entity\Line as LineEntityFactory;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class Line implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new LineController(
            $container->get(LineEntityFactory::class)
        );
    }
}
