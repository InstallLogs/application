<?php
namespace Application\Model\Service;

use Application\Model\Table\Line as LineTable;

class Line
{
    public function __construct(
        LineTable $lineTable
    ) {
        $this->lineTable = $lineTable;
    }
}
