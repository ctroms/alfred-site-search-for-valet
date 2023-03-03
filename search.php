<?php

use Ctroms\AlfredValet\Site;
use Ctroms\AlfredValet\Sites;
use Illuminate\Container\Container;

require_once __DIR__ . '/vendor/autoload.php';

Container::setInstance(new Container);

$searchQuery = $argv[1];

$sites = Container::getInstance()->make(Sites::class);

$result = $sites->search($searchQuery)->mapInto(Site::class);

if ($result->isEmpty()) {
    print_r(json_encode([
        'items' => [[
            'title' => 'Site not found',
            'subtitle' => 'Please search for another site',
            'arg' => '',
        ]]
    ]));

    return;
}

print_r(json_encode([
    'items' => $result->values(),
]));


