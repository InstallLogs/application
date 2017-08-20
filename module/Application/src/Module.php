<?php
namespace Application;

use Application\Model\Service\Log as LogService;
use Application\Model\Table\Line as LineTable;
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
                        $serviceManager->get(LineTable::class),
                        $serviceManager->get(LogTable::class)
                    );
                },
                LineTable::class => function ($serviceManager) {
                    return new LineTable(
                        $serviceManager->get('installl')
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
