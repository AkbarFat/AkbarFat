<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Product;
use App\Models\User;
use Database\Factories\ProductFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(ImageSeeder::class);

        $category=category::all();

        $product = Product::factory(10)->recycle($category)->create();
        


        User::factory(1)->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
