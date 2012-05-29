<?php

namespace Blog\ActivityStreams\Renderer;

use ActivityStreams\Renderer\RendererInterface;
use ActivityStreams\Action\ActionInterface;

class PostRenderer implements RendererInterface
{
    public function render(ActionInterface $action, array $options = array())
    {
        return '_post_render.twig';
    }

    public function getType()
    {
        return 'post';
    }
}
