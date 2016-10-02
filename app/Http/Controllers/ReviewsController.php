<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Review;
use App\Challenge;

use Validator;
use Log;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->check()) {
            return back();
        }

        $validator = Validator::make($request->all(), [
            'value' => 'required',
            'body' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('challenges.show', $request->get('challenge_id'))
                ->withErrors($validator)
                ->withInput();
        }

        $check_for_existing_review = Review::where('reviewable_id', $request->get('challenge_id'))
        ->where('user_id', auth()->id())
        ->count();

        if ($check_for_existing_review) {
            return back();
        }

        $challenge = Challenge::findOrFail($request->get('challenge_id'));

        $review = new Review([
            'user_id' => auth()->id(),
            'value' => $request->get('value'),
            'body'=> $request->get('body')
        ]);

        $challenge->reviews()->save($review);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        if ( !auth()->check() ) {
            return back();
        }

        $user = auth()->user();

        if ( $user != $review->user ) {
            return back();
        }

        $validator = Validator::make($request->all(), [
            'value' => 'required',
            'body' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reviews.edit', $review)
                ->withErrors($validator)
                ->withInput();
        }

        $review->update($request->all());

        return redirect()->route('challenges.show', $review->reviewable);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        if ( !auth()->check() ) {
            return back();
        }

        $user = auth()->user();

        if ( $user != $review->user ) {
            return back();
        }

        $review->delete();

        return back();
    }
}
