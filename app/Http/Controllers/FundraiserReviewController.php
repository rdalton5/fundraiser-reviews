<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundraiserReviewRequest;
use App\Models\FundraiserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FundraiserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //probably don't need this one, who wants to view a bunch of unrelated fundraisers?
        return response()->json(FundraiserReview::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // I'll probably handle this with vue
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFundraiserReviewRequest $request)
    {
        $fundraiser = FundraiserReview::create([
            'rating' => $request->rating,
            'review' => $request->review,
            'fundraiser_id' => $request->fundraiser_id,
            'user_id' => Auth::id()
        ]);

        return response()->json($fundraiser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundraiserReview  $fundraiserReview
     * @return \Illuminate\Http\Response
     */
    public function show(FundraiserReview $fundraiserReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundraiserReview  $fundraiserReview
     * @return \Illuminate\Http\Response
     */
    public function edit(FundraiserReview $fundraiserReview)
    {
        // I'll probably handle this with vue
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundraiserReview  $fundraiserReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundraiserReview $fundraiserReview)
    {
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundraiserReview  $fundraiserReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundraiserReview $fundraiserReview)
    {
        //TODO
    }
}
