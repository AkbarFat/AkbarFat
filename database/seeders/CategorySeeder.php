<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug' => 'electornics',
                'name' => 'Electornics',
            ],
            [
                'slug' => 'food',
                'name' => 'Food',
            ],
            [
                'slug' => 'questions',
                'name' => 'Questions',
            ],
            [
                'slug' => 'conspiracies',
                'name' => 'Conspiracies',
            ],
            [
                'slug' => 'books',
                'name' => 'Books',
            ]
        ];

        Category::upsert($data, ['slug']);
    }
}