<?php
namespace Application\Model\Table;

use Zend\Db\Adapter\Adapter;

class Log
{
    public function __construct(
        Adapter $adapter
    ) {
        $this->adapter = $adapter;
    }

    public function insertText($text)
    {
        $sql = '
            INSERT INTO `log`
                   (`text`)
            VALUES (?)
                 ;
        ';
        $result = $this->adapter->query($sql, [$text]);
        return (int) $result->getGeneratedValue();
    }
}
