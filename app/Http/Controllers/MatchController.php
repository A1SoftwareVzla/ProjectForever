<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Fixture;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;


class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs = Match::with(['fixture', 'localTeam', 'visitorTeam'])->orderBy('date', 'DESC')->get();
        return Inertia::render('Match/Index', [
            'matches' => $matchs,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fixtures = Fixture::orderBy('id', 'DESC')->get(['id', 'name']);
        $teams = Team::orderBy('name', 'ASC')->get(['id', 'name', 'short_name']);
        
        return Inertia::render('Match/Create', [
            'fixtures' => $fixtures,
            'teams' => $teams,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fixture_id' => 'required|exists:fixtures,id',
            'local_team_id' => 'required|exists:teams,id',
            'visitor_team_id' => 'required|exists:teams,id|different:local_team_id',
            'date' => 'required|date',
            'result' => 'nullable|string|max:20',
        ]);

        $match = Match::create($request->all());
        
        return redirect()->route('match.index')->with('success', 'Juego guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        $match->load(['fixture', 'localTeam', 'visitorTeam']);
        
        return Inertia::render('Match/Show', [
            'match' => $match,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        $match->load(['fixture', 'localTeam', 'visitorTeam']);
        $teams = Team::orderBy('name','ASC')->get(['id', 'name', 'short_name']);
        $fixtures = Fixture::orderBy('id', 'DESC')->get(['id', 'name']);
        
        return Inertia::render('Match/Edit', [
            'match' => $match,
            'teams' => $teams,
            'fixtures' => $fixtures,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        $request->validate([
            'fixture_id' => 'required|exists:fixtures,id',
            'local_team_id' => 'required|exists:teams,id',
            'visitor_team_id' => 'required|exists:teams,id|different:local_team_id',
            'date' => 'required|date',
            'result' => 'nullable|string|max:20',
        ]);

        $match->fill($request->all())->save();
        
        return redirect()->route('match.index')->with('success', 'Juego editado con éxito');
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
        return redirect()->route('match.index')->with('success', 'El juego fué eliminado con éxito');
    }
}
