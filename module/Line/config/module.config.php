<?php
namespace Line;

use Line\Model\Factory\View\Helper\Href as HrefHelperFactory;

return [
    'view_helpers' => [
        'factories' => [
            'lineHref' => HrefHelperFactory::class,
        ],
    ],
];
