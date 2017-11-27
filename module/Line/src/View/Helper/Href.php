<?php
namespace Line\View\Helper;

use String\Model\Service\UrlFriendly as UrlFriendlyService;
use Zend\View\Helper\AbstractHelper;

class Href extends AbstractHelper
{
    public function __construct(UrlFriendlyService $urlFriendlyService)
    {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    public function __invoke()
    {
    }
}
