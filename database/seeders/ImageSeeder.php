<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'product_id'=>'1',
                'image_path'=>'public/images/p1.png'
            ],
            [
                'product_id'=>'2',
                'image_path'=>'public/images/p2.png'
            ],
            [
                'product_id'=>'3',
                'image_path'=>'public/images/p3.png'
            ],
            [
                'product_id'=>'4',
                'image_path'=>'public/images/p4.png'
            ],
            [
                'product_id'=>'5',
                'image_path'=>'public/images/p5.png'
            ],
            [
                'product_id'=>'6',
                'image_path'=>'public/images/p6.png'
            ],
            [
                'product_id'=>'7',
                'image_path'=>'public/images/p7.png'
            ],
            [
                'product_id'=>'8',
                'image_path'=>'public/images/p8.png'
            ],
            [
                'product_id'=>'9',
                'image_path'=>'public/images/p1.png'
            ],
            [
                'product_id'=>'10',
                'image_path'=>'public/images/p2.png'
            ],

            
        ];

        Image::upsert($data, ['image_path']);
    }
}
