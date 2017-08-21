<?php
namespace Application\Model\Service;

use Application\Model\Table\Line as LineTable;
use Application\Model\Table\Log as LogTable;

class Log
{
    public function __construct(
        LineTable $lineTable,
        LogTable $logTable
    ) {
        $this->lineTable = $lineTable;
        $this->logTable  = $logTable;
    }

    public function insertLog($text)
    {
        $this->logTable->insertText($text);

        $lines = preg_split('/\R/', $text);
        foreach ($lines as $line) {
            $lineId = $this->lineTable->insertString($line);
        }
    }
}
