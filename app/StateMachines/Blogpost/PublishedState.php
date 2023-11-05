<?php

namespace App\StateMachines\Blogpost;

/**
 * Represents the "Published" state of a blog post.
 *
 * This state signifies that a blog post has been published and is considered
 * a final state. No state transitions are allowed from this state.
 */
class PublishedState extends BaseBlogPostState {}