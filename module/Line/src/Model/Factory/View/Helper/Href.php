<?php
namespace Line\Model\Factory\View\Helper;

use Interop\Container\ContainerInterface;
use Line\View\Helper\Href as LineHrefHelper;
use Zend\ServiceManager\Factory\FactoryInterface;

class Href implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new LineHrefHelper(
        );
    }
}
