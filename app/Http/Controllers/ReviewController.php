<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Review::all();
    }

    public function store(StoreReviewRequest $request)
    {
        return Review::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return $review;
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->update($request->validated());

        return $review->refresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return $review;
    }
}
