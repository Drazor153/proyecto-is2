<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{   
    /**
     * 
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>$this->faker->sentence(2), 
            'category' =>$this->faker->randomElement(['Academico', 'Administrativo', 'Software']),
            'status' => 'Pendiente', 
            'cost' =>$this->faker->randomNumber(8, true), 
            'po_id' => $this->faker->randomDigit() + 1
        ];
    }
}
