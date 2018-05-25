<?php

namespace App\Http\Controllers;

use App\Match;
use App\Fixture;use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests\MatchStoreRequest;
use App\Http\Requests\MatchUpdateRequest;


class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs = Match::OrderBy('date', 'DESC')->get();
        $fixtures = Fixture::OrderBy('id', 'DESC')->pluck('name', 'id');
        $teams = Team::OrderBy('name', 'ASC')->pluck('name','id');
        return view('admin.match.index')->with(compact('matchs', 'fixtures', 'teams'));
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
    public function store(MatchStoreRequest $request)
    {
        $match = Match::create($request->all());
        
        return redirect()->route('match.index')->with('info','Juego guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        $teams = Team::orderBy('name','ASC')->pluck('name', 'id');
        $fixtures = Fixture::OrderBy('id', 'DESC')->pluck('name', 'id');
        return view('admin.match.edit')->with(compact('match', 'teams', 'fixtures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(MatchUpdateRequest $request, Match $match)
    {
        $match->fill($request->all())->save();
        $teams = Team::orderBy('name','ASC')->pluck('name', 'id');
        $fixtures = Fixture::OrderBy('id', 'DESC')->pluck('name', 'id');
        return redirect()->route('match.edit', $match->id)->with('info','Juego editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        Match::find($match->id)->delete();
        return redirect()->route('match.index')->with('info',' El juego fué eliminado con éxito');
    }
}
