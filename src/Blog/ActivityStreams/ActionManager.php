<?php

namespace Blog\ActivityStreams;

use ActivityStreams\StreamableInterface;
use ActivityStreams\Action\ActionInterface;
use ActivityStreams\Action\ActionManagerInterface;
use ActivityStreams\DataResolver\DataResolverProvider;
use Blog\Model\Action;
use Blog\Model\ActionQuery;

class ActionManager implements ActionManagerInterface
{
    protected $dataResolverProvider;

    public function __construct(DataResolverProvider $dataResolverProvider)
    {
        $this->dataResolverProvider = $dataResolverProvider;
    }

    public function findAll()
    {
        return ActionQuery::create()->find();
    }

    public function createAction(StreamableInterface $actor, $verb, StreamableInterface $object = null, StreamableInterface $target = null)
    {
        $action = new Action();
        $action->setActorId($actor->getStreamIdentifier());
        $action->setActorType($actor->getStreamType());
        
        $actorResolver = $this->dataResolverProvider->get($actor->getStreamIdentifier(), $actor->getStreamType());
        $action->setActorUrl($actorResolver->getUrl());
        $action->setActorName($actorResolver->getName());
        $action->setActorImage($actorResolver->getImage());
        
        $action->setVerb($verb);

        if (null !== $object) {
            $action->setObjectId($object->getStreamIdentifier());
            $action->setObjectType($object->getStreamType());
            
            $objectResolver = $this->dataResolverProvider->get($object->getStreamIdentifier(), $object->getStreamType());
            $action->setObjectUrl($objectResolver->getUrl());
            $action->setObjectName($objectResolver->getName());
            $action->setObjectImage($objectResolver->getImage());
        }
    
        if (null !== $target) {
            $action->setTargetId($target->getStreamIdentifier());
            $action->setTargetType($target->getStreamType());
            
            $targetResolver = $this->dataResolverProvider->get($target->getStreamIdentifier(), $target->getStreamType());
            $action->setTargetUrl($targetResolver->getUrl());
            $action->setTargetName($targetResolver->getName());
            $action->setTargetImage($objectResolver->getImage());
        }
        
        $action->setPublishedAt(time());
        $action->save();

        return $action;
    }
    
    public function updateAction(ActionInterface $action)
    {
        // ..
    }
}

