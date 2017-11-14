<?php
namespace Application\Model\Factory\View\Helper\Line;

use Interop\Container\ContainerInterface;
use Application\View\Helper\Line\Url as LineUrlHelper;
use Zend\ServiceManager\Factory\FactoryInterface;

class Url implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new LineUrlHelper(
        );
    }
}
