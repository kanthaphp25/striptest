<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
	 
	 protected $model = products::class;
	 
    public function definition()
    {
		$faker = app('Faker');

        return [
            'name' =>$faker->product_name(),
			'price' => $faker->numberBetween(100, 1000),
			'description' => substr($faker->paragraph(),0,245)
        ];
    }
}
