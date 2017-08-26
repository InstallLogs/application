<?php
namespace Application\Model\Factory\Model\Entity;

use Application\Model\Table\Line as LineTable;

class Line
{
    public function __construct(LineTable $lineTable)
    {
        $this->lineTable = $lineTable;
    }

    public function buildFromLineId(int $lineId)
    {
    }
}
