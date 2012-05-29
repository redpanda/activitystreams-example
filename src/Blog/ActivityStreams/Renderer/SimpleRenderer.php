<?php

namespace Blog\ActivityStreams\Renderer;

use ActivityStreams\Renderer\RendererInterface;
use ActivityStreams\Action\ActionInterface;

class SimpleRenderer implements RendererInterface
{
    public function render(ActionInterface $action, array $options = array())
    {
        if ($action->getTargetId()) {
            return sprintf("%s %s %s on %s", $action->getActorName(), $action->getVerb(), $action->getObjectName(), $action->getTargetName());
        } else if ($action->getObjectId()) {
            return sprintf("%s %s %s", $action->getActorName(), $action->getVerb(), $action->getObjectName());
        } else {
            return sprintf("%s %s", $action->getActorName(), $action->getVerb());
        }
    }

    public function getType()
    {
        return 'simple';
    }
}
