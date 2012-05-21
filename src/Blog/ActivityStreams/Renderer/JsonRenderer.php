<?php

namespace Blog\ActivityStreams\Renderer;

use ActivityStreams\Action\ActionInterface;
use ActivityStreams\Renderer\RendererInterface;

class JsonRenderer implements RendererInterface
{
    public function render(ActionInterface $action, array $options = array())
    {
        $data = array(
            'published' => date('Y-M-d h:i:s', $action->getPublishedAt()->getTimestamp()),
            'actor'           => array(
                'url'         => $action->getActorUrl(),
                'type'        => $action->getActorType(),
                'id'          => $action->getActorId(),
                'image'       => $action->getActorImage(),
                'displayName' => $action->getActorName(),
            ),
            'verb'  => $action->getVerb(),
        );

        if ($action->getObjectId()) {
            $data['object'] = array(
                'url'         => $action->getObjectUrl(),
                'type'        => $action->getObjectType(),
                'id'          => $action->getObjectId(),
                'image'       => $action->getObjectImage(),
                'displayName' => $action->getObjectName(),
            );
        }

        if ($action->getTargetId()) {
            $data['target'] = array(
                'url'         => $action->getTargetUrl(),
                'type'        => $action->getTargetId(),
                'id'          => $action->getTargetType(),
                'image'       => $action->getTargetImage(),
                'displayName' => $action->getTargetName(),
            );
        }

        return json_encode(array($data));
    }
}
