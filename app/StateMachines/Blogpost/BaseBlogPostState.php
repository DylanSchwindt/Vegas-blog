<?php

namespace App\StateMachines\Blogpost;

use App\Interfaces\BlogStateContract;
use App\Models\Blogpost;

/**
 * Base class for blog post states implementing the BlogStateContract interface.
 *
 * This class provides a common base for different states of a blog post. It implements
 * the methods defined in the BlogStateContract interface with default behavior.
 *
 * @note Remember to update the BlogStateContract interface if any new statuses are added
 *       to the BlogPost resource.
 */
class BaseBlogPostState implements BlogStateContract
{
    public function __construct(protected Blogpost $blogpost)
    {
    }

    public function draft() {
        throw new Exception('This blogpost cannot be shifted to this status: draft');
    }
    public function published() {
        throw new Exception('This blogpost cannot be shifted to this status: published');
    }
    public function scheduled() {
        throw new Exception('This blogpost cannot be shifted to this status: scheduled');
    }
}