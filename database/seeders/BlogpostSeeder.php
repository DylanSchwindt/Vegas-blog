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
        Blogpost::factory(5)->draft()->create();

        Blogpost::factory(3)->scheduledForFuture()->create();

        Blogpost::factory(4)->publishedAndPublic()->create();

        Blogpost::factory(2)->publishedButNotPublic()->create();

        Blogpost::factory(2)->invalidPublishedDate()->create();

        Blogpost::factory(10)->create();
    }
}
