<?php

namespace Tests\Feature\Reviews;

use App\Models\Fundraiser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RatingRangeTest extends TestCase
{
    /**
     * the request should return with validation errors when a 
     * rating not in the range 1-5 is given
     * 
     * @dataProvider invalidRatingsProvider
     * 
     * @return void
     */
    public function test_invalid_ratings($rating)
    {
        $user = User::factory()->createOne();
        $fundraiser = Fundraiser::factory()->createOne();
        $response = $this->actingAs($user)->post('/fundraiser-reviews', [
            'fundraiser_id' => $fundraiser->id,
            'rating' => $rating,
            'review' => 'rating test'
        ]);

        $response->assertSessionHasErrors(['rating']);
    }

    /**
     * the request should not be invalidated for valid ratings 1-5
     * 
     * @dataProvider validRatingsProvider
     * 
     * @return void
     */
    public function test_valid_ratings($rating)
    {
        $user = User::factory()->createOne();
        $fundraiser = Fundraiser::factory()->createOne();
        $response = $this->actingAs($user)->post('/fundraiser-reviews', [
            'fundraiser_id' => $fundraiser->id,
            'rating' => $rating,
            'review' => 'rating test'
        ]);

        $response->assertSessionHasNoErrors();
    }

    public function validRatingsProvider()
    {
        return [[1], [2], [3], [4], [5]];
    }
    public function invalidRatingsProvider()
    {
        return [[-1], [0], [6], [0.999], [5.0001], [99995]];
    }
}
