<?php
namespace Application;

use Application\Model\Service\Log as LogService;
use Application\Model\Table\Log as LogTable;

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
                    return new LogService(
                        $serviceManager->get(LogTable::class)
                    );
                },
                LogTable::class => function ($serviceManager) {
                    return new LogTable(
                        $serviceManager->get('installl')
                    );
                },
            ],
        ];
    }
}
