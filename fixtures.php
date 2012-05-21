<?php

require __DIR__.'/vendor/autoload.php';

use ActivityStreams\ActionInterface;
use ActivityStreams\DataResolver\DataResolverProvider;
use Blog\ActivityStreams\ActionManager;
use Blog\ActivityStreams\Renderer\SimpleRenderer;
use Blog\ActivityStreams\Renderer\JsonRenderer;
use Blog\ActivityStreams\DataResolver\UserResolver;
use Blog\ActivityStreams\DataResolver\PostResolver;
use Blog\ActivityStreams\DataResolver\CategoryResolver;
use Blog\Model\User;
use Blog\Model\UserQuery;
use Blog\Model\Category;
use Blog\Model\CategoryQuery;
use Blog\Model\Post;
use Blog\Model\PostQuery;

// init Propel
Propel::init(__DIR__.'/config/conf/Blog-conf.php');

function writeln($object)
{
    echo sprintf('Created "%s" with id "%s"', get_class($object), $object->getId()).PHP_EOL;
}

// create data resolver provider instance
$provider = new DataResolverProvider(); 
$provider->addDataResolver(new UserResolver());
$provider->addDataResolver(new PostResolver());
$provider->addDataResolver(new CategoryResolver());

// create action manager instance
$actionManager = new ActionManager($provider);

// create fixtures
foreach (array('john', 'tobi', 'adam') as $id => $username) {
    $user = new User();
    $user->setUsername($username);

    // save user
    $user->save();
    writeln($user);
}

for ($i=1; $i<=10; $i++) {
    $category = new Category();
    $category->setName('Category '.$i);

    $user = UserQuery::create()->findPk(rand(1,3));
    $category->setUser($user);
    
    // save category
    $category->save();

    // create action
    $actionManager->createAction($category->getUser(), 'create', $category);

    writeln($category);
}

for ($i=1; $i<=100; $i++) {
    $post = new Post();
    $post->setName('Post '.$i);
    
    $user = UserQuery::create()->findPk(rand(1,3));
    $post->setUser($user);
    
    $category = $user = CategoryQuery::create()->findPk(rand(1,9));
    $post->setCategory($category); 
  
    // create post
    $post->save();

    // create action
    $actionManager->createAction($post->getUser(), 'publish', $post, $post->getCategory());
    writeln($post);
}
