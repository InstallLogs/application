<?php
namespace Application\Model\Table;

use Zend\Db\Adapter\Adapter;

class LogLine
{
    public function __construct(
        Adapter $adapter
    ) {
        $this->adapter = $adapter;
    }

    public function insert($logId, $lineId)
    {
        $sql = '
            INSERT INTO `log_line`
                   (`log_id`, `line_id`)
            VALUES (?, ?)
                 ;
        ';
        $result = $this->adapter->query($sql, [$logId, $lineId]);
    }
}
