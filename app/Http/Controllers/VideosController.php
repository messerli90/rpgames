<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Video;
use App\Challenge;

use Validator;
use Log;

class VideosController extends Controller
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
        if ( !auth()->check() ) {
            return back();
        }

        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required|url',
            'challenge_id' => 'required|exists:challenges,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('challenges.show', $request->get('challenge_id'))
            ->withErrors($validator)
            ->withInput();
        }

        // Attach user_id to request object
        $request->request->add(['user_id' => $user->id]);

        $challenge = Challenge::findOrFail($request->get('challenge_id'));

        $url = Video::transformURL($request->get('url'));

        $review = new Video([
            'user_id' => auth()->id(),
            'title' => $request->get('title'),
            'description'=> $request->get('description'),
            'url' => $url
        ]);

        $challenge->videos()->save($review);

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
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Video $video)
    {
        if ( !auth()->check() ) {
            return back();
        }

        $user = auth()->user();

        if ( $user != $video->user ) {
            return back();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required|url'
        ]);

        if ($validator->fails()) {
            return redirect()->route('videos.edit', $video)
            ->withErrors($validator)
            ->withInput();
        }

        $url = Video::transformURL($request->get('url'));

        $request->request->add(['url' => $url]);

        $video->update($request->all());

        return redirect()->route('challenges.show', $video->challenge);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Video $video)
    {
        if ( !auth()->check() ) {
            return back();
        }

        $user = auth()->user();

        if ( $user != $video->user ) {
            return back();
        }

        $video->delete();

        return back();
    }
}
