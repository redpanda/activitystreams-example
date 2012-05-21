<?php

namespace Blog\Model;

use ActivityStreams\StreamableInterface;
use Blog\Model\om\BasePost;

/**
 * Skeleton subclass for representing a row from the 'post' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Blog.Model
 */
class Post extends BasePost implements StreamableInterface
{
    const CREATE_POST = 'created post';

    public function getStreamIdentifier()
    {
        return $this->getId();
    }

    public function getStreamType()
    {
        return 'post';
    }
} // Post
