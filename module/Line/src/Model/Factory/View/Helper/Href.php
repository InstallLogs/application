<?php
namespace Line\Model\Factory\View\Helper;

use Interop\Container\ContainerInterface;
use Line\View\Helper\Href as LineHrefHelper;
use String\Model\Service\UrlFriendly as UrlFriendlyService;
use Zend\ServiceManager\Factory\FactoryInterface;

class Href implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new LineHrefHelper(
            $container->get(UrlFriendlyService::class)
        );
    }
}
