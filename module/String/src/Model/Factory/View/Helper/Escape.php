<?php
namespace String\Model\Factory\View\Helper;

use Interop\Container\ContainerInterface;
use String\View\Helper\Escape as EscapeHelper;
use Zend\ServiceManager\Factory\FactoryInterface;

class Escape implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new EscapeHelper(
        );
    }
}
