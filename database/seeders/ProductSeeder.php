<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = Image::all();

        foreach ($images as $image){
            Product::create([
                'image_path'=> $image->id,
            ]);
        }

    }
};
