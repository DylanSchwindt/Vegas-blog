<?php

namespace App\Models;

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
        'seo_title',
        'seo_description',
        'is_public',
        'published_at',
        'view_count',
    ];


    protected $casts = [
        'id' => 'integer',
        'published_at' => 'datetime',
        'is_public' => 'boolean',
    ];


}
