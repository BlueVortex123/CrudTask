<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'user_id' => $this->faker->define(\App\Models\Person::class),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'deadline' => $this->faker->date('d-m-Y', 'now'),
          
        ];
    }
}
