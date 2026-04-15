<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('name','ASC')->get();
        return Inertia::render('Team/Index', [
            'teams' => $teams,
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
    public function create(Request $request)
    {
        return Inertia::render('Team/Create', [
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
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50|unique:teams',
            'symbol' => 'nullable|image|max:2048',
        ]);

        $team = Team::create($request->except('symbol'));
        
        if($request->file('symbol')){
            $path = Storage::disk('public')->put('symbols', $request->file('symbol'));
            $team->fill(['symbol' => asset($path)])->save();
        }
        
        return redirect()->route('team.index')->with('success', 'Equipo guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return Inertia::render('Team/Show', [
            'team' => $team,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return Inertia::render('Team/Edit', [
            'team' => $team,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50|unique:teams,short_name,' . $team->id,
            'symbol' => 'nullable|image|max:2048',
        ]);

        $team->fill($request->except('symbol'))->save();

        if($request->file('symbol')){
            $path = Storage::disk('public')->put('symbols', $request->file('symbol'));
            $team->fill(['symbol' => asset($path)])->save();
        }

        return redirect()->route('team.index')->with('success', 'Equipo editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        Team::find($team->id)->delete();
        return redirect()->route('team.index')->with('success', 'Equipo de '.$team->name.' fué eliminado con éxito');
    }
}
