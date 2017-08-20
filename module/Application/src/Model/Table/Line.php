<?php
namespace Application\Model\Table;

use Zend\Db\Adapter\Adapter;

class Line
{
    public function __construct(
        Adapter $adapter
    ) {
        $this->adapter = $adapter;
    }

    public function insertString($string)
    {
        $sql = '
            INSERT INTO `line`
                   (`string`)
            VALUES (?)
                 ;
        ';
        $result = $this->adapter->query($sql, [$string]);
    }
}
