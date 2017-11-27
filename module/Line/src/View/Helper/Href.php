<?php
namespace Line\View\Helper;

use Application\Model\Entity\Line as LineEntity;
use String\Model\Service\UrlFriendly as UrlFriendlyService;
use Zend\View\Helper\AbstractHelper;

class Href extends AbstractHelper
{
    public function __construct(UrlFriendlyService $urlFriendlyService)
    {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    public function getHref(LineEntity $lineEntity)
    {
        $slug = $this->urlFriendlyService->getUrlFriendly($lineEntity->string);

        return '/line/' . intval($lineEntity->lineId) . '/' . $slug;
    }
}
