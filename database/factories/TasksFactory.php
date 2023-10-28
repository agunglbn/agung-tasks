<?php

namespace Database\Factories;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Factories\Factory;

class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Tasks::class;
    public function definition()
    {
        return [
            //
            'name' => $this->faker->sentence(mt_rand(2, 5)),
            'deskripsi' => $this->faker->paragraph(),
            'status' => mt_rand(1, 2),
            'user_id' => mt_rand(1, 5),
            'img' => $this->faker->sentence(mt_rand(2, 3)),

        ];
    }
}
