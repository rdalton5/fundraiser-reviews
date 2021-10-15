<?php

namespace Tests\Feature\Reviews;

use App\Models\Fundraiser;
use App\Models\FundraiserReview;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewLimitTest extends TestCase
{
    /**
     * the request should return invalid when the user has already reviewed the fundraiser
     *
     * @return void
     */
    public function test_validation_error_when_a_user_review_already_exists()
    {
        $fundraiser = Fundraiser::factory()->createOne();
        $user = User::factory()->createOne();
        FundraiserReview::factory()->createOne(['fundraiser_id' => $fundraiser->id, 'user_id' => $user->id]);


        $response = $this->actingAs($user)->post('/fundraiser-reviews', [
            'fundraiser_id' => $fundraiser->id,
            'rating' => 1,
            'review' => 'abcd'
        ]);

        $response->assertSessionHasErrors(['user_id']);
    }
}
