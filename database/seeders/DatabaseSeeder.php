<?php
namespace Database\Seeders;
use App\Models\{User, Category, Post};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create(['name' => 'Demo User', 'email' => 'demo@example.com']);
        
        $cat1 = Category::create(['name' => 'Technology', 'description' => 'Tech articles']);
        $cat2 = Category::create(['name' => 'Lifestyle', 'description' => 'Lifestyle posts']);
        
        Post::create(['user_id' => $user->id, 'category_id' => $cat1->id, 'title' => 'Getting Started with Laravel', 'excerpt' => 'Learn the basics of Laravel framework.', 'content' => "Laravel is a web application framework with expressive, elegant syntax. We've already laid the foundation — freeing you to create without sweating the small things.", 'status' => 'published', 'published_at' => now()]);
        Post::create(['user_id' => $user->id, 'category_id' => $cat2->id, 'title' => 'My First Blog Post', 'excerpt' => 'Welcome to my blog!', 'content' => 'This is the beginning of an exciting journey. Stay tuned for more content!', 'status' => 'published', 'published_at' => now()->subDay()]);
        Post::create(['user_id' => $user->id, 'title' => 'Draft Article', 'content' => 'This is still being worked on...', 'status' => 'draft']);
    }
}
