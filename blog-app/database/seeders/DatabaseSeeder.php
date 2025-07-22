<?php

namespace Database\Seeders;

use App\Models\BlogEntry;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = Category::factory(10)->create();

        // Create 20 blog entries
        BlogEntry::factory(50)->create()->each(function ($blog) use ($categories) {
            // Randomly assign 1-3 categories to each blog entry
            $blog->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
