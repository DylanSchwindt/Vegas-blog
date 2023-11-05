<?php

namespace App\Enums;

class BlogPostType
{
    public const TUTORIALS = 'tutorials';
    public const NEWS = 'news';
    public const ARTICLES = 'articles';


    public const COOL_TECH = 'cool_tech';

    public static function all(): array
    {
        return [
            self::TUTORIALS,
            self::NEWS,
            self::ARTICLES,
            self::COOL_TECH
        ];

    }
}