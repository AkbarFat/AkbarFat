<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\Image;
use App\Models\Product;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

use function Pest\Laravel\call;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = category::pluck('id')->toArray(); // Get array of user IDs
        $images = Image::all();

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'category_id' => $categories[array_rand($categories)], // Randomly pick a user ID
        ];
    }
}
