<?php

namespace Blog\ActivityStreams\Renderer;

use ActivityStreams\Renderer\RendererInterface;
use ActivityStreams\Action\ActionInterface;

class DefaultRenderer implements RendererInterface
{
    public function render(ActionInterface $action, array $options = array())
    {
        return '_action_render.twig';
    }

    public function getType()
    {
        return 'default';
    }
}
