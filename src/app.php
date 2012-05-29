<?php
require __DIR__.'/../vendor/autoload.php';

use Blog\ActivityStreams\Renderer\JsonRenderer;

use Blog\Model\CategoryQuery;
use Blog\Model\PostQuery;
use Blog\Model\UserQuery;
use Blog\Twig\Extension\ActivityStreamsExtension;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use ActivityStreams\DataResolver\DataResolverProvider;
use Blog\ActivityStreams\ActionManager;
use Blog\ActivityStreams\DataResolver\UserResolver;
use Blog\ActivityStreams\DataResolver\PostResolver;
use Blog\ActivityStreams\DataResolver\CategoryResolver;
use Blog\ActivityStreams\Renderer\DefaultRenderer;
use Blog\ActivityStreams\Renderer\PostRenderer;
use ActivityStreams\Renderer\RendererProvider;

Propel::init(__DIR__.'/../config/conf/Blog-conf.php');

$app = new Application();
$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
    'twig.path'       => __DIR__.'/templates',
    'twig.class_path' => __DIR__.'/../vendor/twig/lib',
    'twig.options'    => array('cache' => __DIR__.'/../cache/twig', 'debug' => true),
));

$app['activity_streams.renderer_chain'] = $app->share(function () use ($app) {
    return new RendererProvider(new DefaultRenderer());
});

$app['activity_streams.renderer_chain']->addRenderer(new PostRenderer());
$app['twig']->addExtension(new ActivityStreamsExtension($app['activity_streams.renderer_chain']));

$app['activity_streams.data_resolver_chain'] = $app->share(function () use ($app) {
    return new DataResolverProvider();
});
$app['activity_streams.data_resolver_chain']->addDataResolver(new CategoryResolver());
$app['activity_streams.data_resolver_chain']->addDataResolver(new PostResolver());
$app['activity_streams.data_resolver_chain']->addDataResolver(new UserResolver());

$app['activity_streams.action_manager'] = $app->share(function () use ($app) {
    return new ActionManager($app['activity_streams.data_resolver_chain']);
});

$app->get('/', function () use ($app) {
    $actions = $app['activity_streams.action_manager']->findAll();
    return $app['twig']->render('index.twig', array('actions' => $actions));
});

$app->get('/activities.json', function () use ($app) {
    $actions = $app['activity_streams.action_manager']->findAll();
    $renderer = new JsonRenderer();

    $res = array();
    foreach ($actions as $action) {
        $res['items'][] = json_decode($renderer->render($action));
    }

    return json_encode($res);
});

$app->get('/user/{id}', function ($id) use ($app) {
    $user = UserQuery::create()->findPk($id);

    return $app['twig']->render('user_show.twig', array('user' => $user));
});

$app->get('/category/{id}', function ($id) use ($app) {
    $category = CategoryQuery::create()->findPk($id);

    return $app['twig']->render('category_show.twig', array('category' => $category));
});

$app->get('/post/{id}', function ($id) use ($app) {
    $post = PostQuery::create()->findPk($id);

    return $app['twig']->render('post_show.twig', array('post' => $post));
});


$app->run();

