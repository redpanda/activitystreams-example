<?php

namespace Blog\ActivityStreams\DataResolver;

use ActivityStreams\DataResolver\AbstractDataResolver;
use Blog\Model\UserQuery;

class UserResolver extends AbstractDataResolver
{
    public function getName()
    {
        return $this->getObject()->getUsername();
    }
    
    public function getUrl()
    {
        return '/post/'.$this->getObject()->getId();
    }
    
    public function getImage()
    {
        return '/image/'.$this->getObject()->getId();
    }
    
    public function getType()
    {
        return 'user';
    }

    public function getObjectQuery($id)
    {
        return UserQuery::create()->findPk($id);
    }
}
