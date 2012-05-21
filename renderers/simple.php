<?php

require __DIR__.'/../vendor/autoload.php';

use Blog\ActivityStreams\Renderer\SimpleRenderer;
use Blog\Model\ActionQuery;

Propel::init(__DIR__.'/../config/conf/Blog-conf.php');

// render activities
$renderer = new SimpleRenderer();
$actions = ActionQuery::create()->find();
foreach ($actions as $action) {
    echo $renderer->render($action).PHP_EOL;
}

