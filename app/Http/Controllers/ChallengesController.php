<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Challenge;
use App\Game;
use App\Platform;
use App\Difficulty;
use App\Language;

use Validator;

class ChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // TODO: Add filters

        $challenges = Challenge::orderBy('created_at', 'desc')
            ->where(function($q) use($request) {
                if($request->get('search')) {
                    $q->where('title', 'like', '%'.$request->get('search').'%');
                }
                if($request->get('game_id')) {
                    $q->where('game_id', $request->get('game_id'));
                }
            })
            ->with(['game', 'platform', 'reviews', 'language', 'difficulty', 'user'])
            ->get();

        return view('challenges.index', compact('challenges'));

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
        $difficulties = Difficulty::orderBy('id', 'asc')->get();
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

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'game_id' => 'required',
            'platform_id' => 'required',
            'difficulty_id' => 'required',
            'language_id' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('challenges.create')
                ->withErrors($validator)
                ->withInput();
        }

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
    public function show(Request $request, Challenge $challenge)
    {
        $challenge = $challenge->load(['game', 'platform', 'language', 'difficulty', 'user', 'reviews']);

        $challenge->incrementViews();

        return view('challenges.show', compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Challenge $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Challenge $challenge)
    {
        $games = Game::orderBy('title', 'asc')->get();
        $platforms = Platform::orderBy('title', 'asc')->get();
        $difficulties = Difficulty::orderBy('id', 'asc')->get();
        $languages = Language::orderBy('title', 'asc')->get();

        $challenge = $challenge->load(['game', 'platform', 'language', 'difficulty', 'user', 'reviews']);

        return view('challenges.edit', compact('challenge', 'games', 'platforms', 'difficulties', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        if ( !auth()->check() ) {
            return back();
        }

        $user = auth()->user();

        if ( $user != $challenge->user ) {
            return back();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'game_id' => 'required',
            'platform_id' => 'required',
            'difficulty_id' => 'required',
            'language_id' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('challenges.update')
                ->withErrors($validator)
                ->withInput();
        }

        $challenge->update($request->all());

        return redirect()->action('ChallengesController@show', $challenge);
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
