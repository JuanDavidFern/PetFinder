<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray(); // Obtener una lista de IDs de usuarios disponibles

        //php artisan db:seed --class=AnimalSeeder
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(1, 15),
            'type' => $this->faker->randomElement(['Dog', 'Cat', 'Bird', 'Rabbit', "Rodent", "Reptile"]),
            'characteristics' => "A snake is a limbless reptile found in various habitats worldwide. They come in different sizes, ranging from a few inches to over 20 feet long. They belong to families like Pythonidae, Colubridae, and Viperidae.",
            'information' => "Species Name: Ophiophagus hannah Description: King Cobras are the world's longest venomous snakes, capable of reaching lengths of up to 18 feet (5.5 meters). They are easily identified by their distinctive hood, which they flare when threatened. They are typically olive-green, brown, or black in color with pale yellow or cream-colored bands along the length of their body.",
            'photo' => $this->faker->randomElement(['storage/animal_imgs/d.jpg', 'storage/animal_imgs/g.png', 'storage/animal_imgs/p.jpg', "storage/animal_imgs/r.jpg", "storage/animal_imgs/s.jpg"]),
            'current_owner_id' => $this->faker->randomElement($userIds), // Asignar un ID de usuario aleatorio
        ];
    }
}
