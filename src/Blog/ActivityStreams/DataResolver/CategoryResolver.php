<?php

namespace Blog\ActivityStreams\DataResolver;

use ActivityStreams\DataResolver\AbstractDataResolver;
use Blog\Model\CategoryQuery;

class CategoryResolver extends AbstractDataResolver
{
    public function getName()
    {
        return $this->getObject()->getName();
    }
    
    public function getUrl()
    {
        return '/category/'.$this->getObject()->getId();
    }
    
    public function getImage()
    {
        return '/image/'.$this->getObject()->getId();
    }

    public function getType()
    {
        return 'category';
    }

    public function getObjectQuery($id)
    {
        return CategoryQuery::create()->findPk($id);
    }
}
