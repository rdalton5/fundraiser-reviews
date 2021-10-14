<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundraiserRequest;
use App\Models\Fundraiser;
use Illuminate\Http\Request;

class FundraiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fundraisers.index', ['fundraisers' => Fundraiser::with('reviews')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //I'll probably handle this with vue
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFundraiserRequest $request)
    {
        Fundraiser::create(['name' => $request->name]);
        return redirect()->route('fundraisers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fundraiser  $fundraiser
     * @return \Illuminate\Http\Response
     */
    public function show(Fundraiser $fundraiser)
    {
        //is there a better way to make sure the reviews are on the object?
        $fundraiser->reviews = $fundraiser->reviews()->with('user')->get();
         
        return view('fundraisers.show', ['fundraiser' => $fundraiser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fundraiser  $fundraiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Fundraiser $fundraiser)
    {
        // I'll probably handle this with vue
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fundraiser  $fundraiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fundraiser $fundraiser)
    {
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fundraiser  $fundraiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fundraiser $fundraiser)
    {
        //TODO
    }
}
