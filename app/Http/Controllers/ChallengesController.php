<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Challenge;
use App\Game;
use App\Platform;
use App\Difficulty;
use App\Language;

class ChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: Add filters

        $challenges = Challenge::with(['game', 'platform', 'language', 'difficulty', 'user'])->get();

        return $challenges;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::orderBy('title', 'asc')->get();
        $platforms = Platform::orderBy('title', 'asc')->get();
        $difficulties = Difficulty::orderBy('title', 'asc')->get();
        $languages = Language::orderBy('title', 'asc')->get();

        return view('challenges.create',
            compact('games', 'platforms', 'difficulties', 'languages')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( !auth()->check() ) {
            return back();
        }

        $user = auth()->user();

        // Attach user_id to request object
        $request->request->add(['user_id' => $user->id]);

        $challenge = Challenge::create($request->all());

        return redirect()->action('ChallengesController@show', $challenge);
    }

    /**
     * Display the specified resource.
     *
     * @param  Challenge $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        return $challenge->load(['game', 'platform', 'language', 'difficulty', 'user']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
