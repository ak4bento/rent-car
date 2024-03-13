<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = fake()->randomElement(["B","DD","DT","AA","AD","K","R","G","H","AB","D","F","E"]);
        $codeDistrict = fake()->randomElement([
            "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O",
            "AB","BD","CW","DK","ES","FK","GV","HW","IO","JP","KK","LM","MW","NZ","OL"
        ]);
        $codeRegion = fake()->randomElement(["A","B","C","D","E","F","G","H","V","U","T","S","R","Q","P"]);

        return [
            'type' => fake()->randomElement(["Honda", "Toyota", "Tesla", "Ford", "Ferrari"]),
            'model' => fake()->randomElement(["M2012","M2013","M2014","M2015","M2016","M2017","M2018","M2019","M2020"]),
            'plate_number' => $code." ".fake()->numberBetween(1000, 9999)." ".$codeDistrict.$codeRegion,
            'rental_rate' => fake()->numberBetween(300000, 1500000),
        ];
    }
}
