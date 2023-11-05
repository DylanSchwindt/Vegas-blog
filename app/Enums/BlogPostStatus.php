<?php

namespace App\Enums;

class BlogPostStatus
{
    public const DRAFT = 'draft';
    public const PUBLISHED = 'published';
    public const SCHEDULED = 'scheduled';
    public static function all(): array
    {
        return [
            self::DRAFT,
            self::PUBLISHED,
            self::SCHEDULED,
        ];
    }
}