<?php

namespace Blog\ActivityStreams\DataResolver;

use ActivityStreams\DataResolver\AbstractDataResolver;
use Blog\Model\PostQuery;

class PostResolver extends AbstractDataResolver
{
    public function getName()
    {
        return $this->getObject()->getTitle();
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
        return 'post';
    }

    public function getObjectQuery($id)
    {
        return PostQuery::create()->findPk($id);
    }
}
