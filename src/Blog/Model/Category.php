<?php

namespace Blog\Model;

use ActivityStreams\StreamableInterface;
use Blog\Model\om\BaseCategory;

/**
 * Skeleton subclass for representing a row from the 'category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Blog.Model
 */
class Category extends BaseCategory implements StreamableInterface
{
    public function getStreamIdentifier()
    {
        return $this->getId();
    }

    public function getStreamType()
    {
        return 'category';
    }
} // Category
