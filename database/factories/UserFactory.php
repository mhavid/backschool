<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = [
            'https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-thumbnail.png',
            'https://static.vecteezy.com/system/resources/thumbnails/001/921/774/small/beautiful-woman-red-hair-in-frame-circular-avatar-character-free-vector.jpg',
            'https://img.freepik.com/premium-vector/young-woman-avatar-character-vector-illustration-design_24877-18520.jpg?w=2000',
            'https://cdn2.iconfinder.com/data/icons/avatar-2/512/oscar_boy-512.png',
            'https://cdn.icon-icons.com/icons2/1879/PNG/512/iconfinder-8-avatar-2754583_120515.png',
            'https://cdn.icon-icons.com/icons2/1879/PNG/512/iconfinder-4-avatar-2754580_120522.png'
        ];

        return [
            'name' => fake()->name(),
            'id_school' => 1,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'foto' => $image[rand(0,5)],
            'id_user_category' => rand(0,5),
            'id_class' => rand(0,5),
            'created_at' => now()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
