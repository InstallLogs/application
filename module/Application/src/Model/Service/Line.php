<?php
namespace Application\Model\Service;

use Application\Model\Factory\Model\Entity\Line as LineEntityFactory;
use Application\Model\Table\Line as LineTable;

class Line
{
    public function __construct(
        LineEntityFactory $lineEntityFactory,
        LineTable $lineTable
    ) {
        $this->lineTable = $lineTable;
        $this->lineEntityFactory = $lineEntityFactory;
    }

    public function getNewestLines()
    {
        $lineArrayGenerator = $this->lineTable->selectOrderByLineIdDesc();
        $lineEntities = [];
        foreach ($lineArrayGenerator as $lineArray) {
            $lineEntities[] = $this->lineEntityFactory->buildFromArray($lineArray);
        }
        return $lineEntities;
    }
}
