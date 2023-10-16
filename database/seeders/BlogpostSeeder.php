<?php

namespace Database\Seeders;

use App\Models\Blogpost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogpostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blogpost::factory()->count(10)->public()->unPublished()->create();
        Blogpost::factory()->count(10)->unPublished()->create();
        Blogpost::factory()->count(10)->published()->create();
        Blogpost::factory()->count(10)->public()->create();
        Blogpost::factory()->count(10)->notPublic()->create();
        Blogpost::factory()->count(10)->publishedButNotPublic()->create();
    }
}
