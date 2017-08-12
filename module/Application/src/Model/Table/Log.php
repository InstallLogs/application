<?php
namespace Application\Model\Table;

use Exception;
use Zend\Db\Adapter\Adapter;

class Log
{
    public function __construct(
        Adapter $adapter
    ) {
        $this->adapter = $adapter;
    }

    public function getSimilarAsins($table, $query, $asin)
    {
        if (preg_match('/\W/', $table)) {
            throw new Exception('Invalid table name.');
        }
        $sql = "
            SELECT `asin`
              FROM $table
             WHERE MATCH(`title`) AGAINST (?)
               AND `asin` != ?
             LIMIT 30
                 ;
        ";
        $rows = $this->adapter->query($sql, [$query, $asin]);

        $asins = [];
        foreach ($rows as $row) {
            $asins[] = $row['asin'];
        }
        return $asins;
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
    }

    public function selectAsinWhereMatchTitleAgainst($table, $query, $page)
    {
        if (preg_match('/\W/', $table)) {
            throw new Exception('Invalid table name.');
        }

        $cacheKey = md5(__METHOD__ . $query . $page);
        if (false != ($asins = $this->memcachedService->get($cacheKey))) {
            return $asins;
        }

        $query = $this->keepOnlyFirstWords($query);
        $offset = (int) (($page - 1) * 100);
        $sql = "
            SELECT `asin`
              FROM `$table`
             WHERE MATCH (`title`) AGAINST (?)
             LIMIT $offset, 100
                 ;
        ";
        $results = $this->adapter->query($sql, [$query]);

        $asins = [];

        foreach ($results as $row) {
            $asins[] = $row['asin'];
        }

        $this->memcachedService->setForDays($cacheKey, $asins, 5);
        return $asins;
    }

    public function selectCountWhereMatchTitleAgainst($table, $query) : int
    {
        if (preg_match('/\W/', $table)) {
            throw new Exception('Invalid table name.');
        }

        $cacheKey = md5(__METHOD__ . $table . $query);
        if (false != ($count = $this->memcachedService->get($cacheKey))) {
            return $count;
        }

        $query = $this->keepOnlyFirstWords($query);
        $sql = "
            SELECT COUNT(*) AS `count`
              FROM `$table`
             WHERE MATCH (`title`) AGAINST (?)
                 ;
        ";
        $row = $this->adapter->query($sql, [$query])->current();

        $count = (int) $row['count'];
        $this->memcachedService->setForDays($cacheKey, $count, 5);
        return $count;
    }

    public function selectMaxModifiedFrom(string $table) : string
    {
        if (preg_match('/\W/', $table)) {
            throw new Exception('Invalid table name.');
        }
        $sql = "
            SELECT MAX(`modified`) AS `max_modified`
              FROM `$table`
                 ;
        ";
        $row = $this->adapter->query($sql)->execute()->current();
        return $row['max_modified'] ?? '0000-01-01 00:00:00';
    }

    private function keepOnlyFirstWords($query)
    {
        $words = explode(' ', $query);
        return implode(' ', array_slice($words, 0, self::MAX_WORDS));
    }
}