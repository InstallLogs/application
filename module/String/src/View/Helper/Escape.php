<?php
namespace String\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Escape extends AbstractHelper
{
    public function __invoke(string $string)
    {
        return htmlspecialchars($string, ENT_SUBSTITUTE | ENT_DISALLOWED);
    }
}
