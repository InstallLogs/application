<?php
namespace Application\Model\Service;

use Application\Model\Table\Log as LogTable;

class Log
{
    public function __construct(LogTable $logTable)
    {
        $this->logTable = $logTable;
    }

    public function insertLog($text)
    {

    }
}
