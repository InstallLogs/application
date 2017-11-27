<?php
namespace String;

use String\Model\Service\UrlFriendly as UrlFriendlyService;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                UrlFriendlyService::class => function ($serviceManager) {
                    return new UrlFriendlyService();
                },
            ],
        ];
    }
}
