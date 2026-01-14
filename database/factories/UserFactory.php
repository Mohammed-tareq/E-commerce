<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected static ?string $password;


    public function definition(): array
    {
        do {
        $country = Country::inRandomOrder()->first();
        } while ($country->governorates->count() ===0);
        do {
            $govenorate = $country->governorates()->inRandomOrder()->first();
        } while ($govenorate->cities->count() === 0);

        $city = $govenorate->cities()->inRandomOrder()->first();
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'country_id' => $country->id,
            'governorate_id' => $govenorate->id,
            'city_id' => $city->id,
            'status' => random_int(0, 1),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }


    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
