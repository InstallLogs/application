<?php
namespace String;

use String\Model\Factory\View\Helper\Escape as EscapeHelperFactory;

return [
    'view_helpers' => [
        'factories' => [
            'escape' => EscapeHelperFactory::class,
        ],
    ],
];
