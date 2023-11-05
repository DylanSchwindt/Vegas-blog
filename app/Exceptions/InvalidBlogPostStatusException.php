<?php

namespace App\Exceptions;

use InvalidArgumentException;

/**
 * Exception thrown when an invalid status is encountered for a blog post.
 *
 * This exception is thrown when an attempt is made to operate on a blog post with an
 * invalid status that is not among the allowed statuses.
 *
 * @package App\Exceptions
 */
class InvalidBlogPostStatusException extends \InvalidArgumentException
{
    public function __construct($message = 'Invalid BlogPost Status Exception', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
