<?php
namespace Application;

use Application\Model\Service\Log as LogService;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                LogService::class => function ($serviceManager) {
                    return new LogService();
                },
            ],
        ];
    }
}
