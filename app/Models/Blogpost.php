<?php

namespace App\Models;

use App\Enums\BlogPostStatus;
use App\Enums\BlogPostType;
use App\Exceptions\InvalidBlogPostStatusException;
use App\Interfaces\BlogStateContract;
use App\StateMachines\Blogpost\DraftState;
use App\StateMachines\Blogpost\PublishedState;
use App\StateMachines\Blogpost\ScheduledState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blogposts';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'content_short',
        'seo_title',
        'seo_description',
        'status',
        'type',
        'is_public',
        'published_at',
        'scheduled_to_publish_at',
        'view_count',
    ];

    protected $casts = [
        'id' => 'integer',
        'published_at' => 'datetime',
        'scheduled_to_publish_at' => 'datetime',
        'is_public' => 'boolean',
        'view_count' => 'integer'
    ];

    /**
     * @var array Default Attributes for the Blogpost
     */
    protected $attributes = [
        'status' => BlogPostStatus::DRAFT,
        'type' => BlogPostType::ARTICLES,
    ];

    /**
     * Get the current state of the blog post and manage state transitions.
     *
     * This method returns an instance of a class that implements the BlogStateContract
     * interface based on the status of the blog post. Each state class provides methods
     * to approve or decline state transitions and perform associated business logic.
     *
     * @return BlogStateContract base Interface with all the base functions.
     *
     * @throws InvalidBlogPostStatusException When the status is not among the allowed statuses.
     *
     * @see BlogStateContract
     * @see DraftState
     * @see PublishedState
     * @see ScheduledState
     * @see InvalidBlogPostStatusException
     */
    public function state(): BlogStateContract {
        return match($this->status){
            BlogPostStatus::DRAFT => new DraftState($this),
            BlogPostStatus::PUBLISHED => new PublishedState($this),
            BlogPostStatus::SCHEDULED => new ScheduledState($this),
            default => throw new InvalidBlogPostStatusException('The status that is saved on blog post:' .$this->id . ' is not amongst the allowed statuses. The status is currently stored is: '. $this->status)
        };
    }
}
