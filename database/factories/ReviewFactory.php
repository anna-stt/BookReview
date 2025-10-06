<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * ReviewFactory
     *
     * This factory is used by Laravel's model factories to generate fake
     * Review model instances for testing and seeding the database.
     *
     * It returns an array of attributes that match the Review model's
     * fillable/columns. The factory also defines several convenience
     * states (good, average, bad) to create reviews with different
     * rating distributions.
     */
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'book_id' => null,

            'review' => fake()->paragraph,


            'rating' => fake()->numberBetween(1, 5),


            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => function (array $attributes) {
                return fake()->dateTimeBetween($attributes['created_at'], 'now');
            }
        ];
    }

    public function good()
    {

        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(4, 5)
            ];
        });
    }

    public function average()
    {

        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(2, 5)
            ];
        });
    }

    public function bad()
    {

        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(1, 3)
            ];
        });
    }
}
