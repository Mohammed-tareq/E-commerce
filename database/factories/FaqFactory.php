<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;


class FaqFactory extends Factory
{
    protected $model = Faq::class;

    public function definition(): array
    {
        return [
            'question' => [
                'ar' => $this->faker->sentence(7),
                'en' => $this->faker->sentence(7),
            ],
            'answer' => [
                'ar' => $this->faker->paragraph(5),
                'en' => $this->faker->paragraph(5),
            ]
        ];
    }
}
