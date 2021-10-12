<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundraiserReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundraiser_reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); //created_at serves at the review date.

            $table->foreignId('fundraiser_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('rating');
            $table->text('review');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fundraiser_reviews');
    }
}
