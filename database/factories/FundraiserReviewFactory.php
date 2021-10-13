<?php

namespace Database\Factories;

use App\Models\Fundraiser;
use App\Models\FundraiserReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FundraiserReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FundraiserReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->text(),
        ];
    }
}
