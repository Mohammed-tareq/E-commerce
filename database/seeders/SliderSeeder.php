<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1 ; $i <= 4 ; $i++ ){
            Slider::create([
                'note' => [
                    'ar' => 'UP TO 70% OFF Fashion Collection Summer Sale Shop Now',
                    'en' => 'UP TO 70% OFF Fashion Collection Summer Sale Shop Now'
                ],
                'image' => 'slider' . $i . '.webp',
            ]);
        }
    }
}
