<?php
namespace Application\Model\Factory\Model\Entity;

use Application\Model\Entity\Line as LineEntity;
use Application\Model\Table\Line as LineTable;

class Line
{
    public function __construct(LineTable $lineTable)
    {
        $this->lineTable = $lineTable;
    }

    public function buildFromArray(array $array)
    {
        $lineEntity = new LineEntity();

        $lineEntity->lineId = $array['line_id'];
        $lineEntity->string = $array['string'];

        return $lineEntity;
    }

    public function buildFromLineId(int $lineId)
    {
        $lineArray = $this->lineTable->selectWhereLineId($lineId);
        $lineEntity = new LineEntity();

        $lineEntity->lineId = $lineArray['line_id'];
        $lineEntity->string = $lineArray['string'];

        return $lineEntity;
    }
}
