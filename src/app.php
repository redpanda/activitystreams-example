<?php
require __DIR__.'/../vendor/autoload.php';

use Blog\ActivityStreams\Renderer\JsonRenderer;
use Blog\Model\ActionQuery;
use Blog\Twig\Extension\ActivityStreamsExtension;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;

Propel::init(__DIR__.'/../config/conf/Blog-conf.php');

$app = new Application();

$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
    'twig.path'       => __DIR__.'/templates',
    'twig.class_path' => __DIR__.'/../vendor/twig/lib',
    'twig.options'    => array('cache' => __DIR__.'/../cache/twig', 'debug' => true),
));

$app['twig']->addExtension(new ActivityStreamsExtension('_action_render.twig'));

$app->get('/', function () use ($app) {
    $actions = ActionQuery::create()->find();
    return $app['twig']->render('index.twig', array('actions' => $actions));
});

$app->get('/activities.json', function () use ($app) {
    $actions = ActionQuery::create()->find();
    $renderer = new JsonRenderer();

    $res = array();
    foreach ($actions as $action) {
        $res['items'][] = json_decode($renderer->render($action));
    }

    return json_encode($res);
});

$app->run();

