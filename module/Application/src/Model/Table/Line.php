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
        return (int) $result->getGeneratedValue();
    }

    public function selectLineIdWhereStringOrReturnNull($string)
    {
        $sql = '
            SELECT `line_id`
              FROM `line`
             WHERE `string` = ?
                 ;
        ';
        $row = $this->adapter->query($sql, [$string])->current();
        return isset($row['line_id'])
             ? (int) $row['line_id']
             : null;
    }

    public function selectWhereLineId($lineId)
    {
        $sql = '
            SELECT `line`.`line_id`
                 , `line`.`string`
              FROM `line`
             WHERE `line`.`line_id` = ?
                 ;
        ';
        return $this->adapter->query($sql, [$lineId])->current();
    }
}
