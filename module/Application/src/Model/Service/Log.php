<?php
namespace Application\Model\Service;

use Application\Model\Table\Line as LineTable;
use Application\Model\Table\Log as LogTable;
use Application\Model\Table\LogLine as LogLineTable;

class Log
{
    public function __construct(
        LineTable $lineTable,
        LogTable $logTable,
        LogLineTable $logLineTable
    ) {
        $this->lineTable     = $lineTable;
        $this->logTable      = $logTable;
        $this->logLineTable  = $logLineTable;
    }

    public function insertLog($text)
    {
        $this->logTable->insertText($text);

        $lines = preg_split('/\R/', $text);
        foreach ($lines as $line) {
            $lineId = $this->lineTable->selectLineIdWhereStringOrReturnNull($line);
            if (!$lineId) {
                $lineId = $this->lineTable->insertString($line);
            }
        }
    }
}
