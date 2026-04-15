<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournaments = Tournament::orderBy('name','ASC')->get();
        return Inertia::render('Tournament/Index', [
            'tournaments' => $tournaments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::orderBy('name','ASC')->get();
        return Inertia::render('Tournament/Create', [
            'teams' => $teams,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'active' => ['boolean'],
            'symbol' => ['nullable', 'image', 'max:2048'],
            'image' => ['nullable', 'image', 'max:2048'],
            'teams' => ['array'],
        ]);

        $tournament = Tournament::create($validated);
        
        if($request->file('symbol')){
            $path = Storage::disk('public')->put('symbols', $request->file('symbol'));
            $tournament->update(['symbol' => asset($path)]);
        }
        if($request->file('image')){
            $path = Storage::disk('public')->put('images', $request->file('image'));
            $tournament->update(['image' => asset($path)]);
        }

        if($request->has('teams')){
            $tournament->teams()->sync($request->get('teams'));
        }

        return redirect()->route('tournament.index')->with('success', 'Torneo guardado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        $tournament->load('teams');
        return Inertia::render('Tournament/Show', [
            'tournament' => $tournament,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        $teams = Team::orderBy('name','ASC')->get();
        $tournament->load('teams');
        return Inertia::render('Tournament/Edit', [
            'tournament' => $tournament,
            'teams' => $teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournament $tournament)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'active' => ['boolean'],
            'symbol' => ['nullable', 'image', 'max:2048'],
            'image' => ['nullable', 'image', 'max:2048'],
            'teams' => ['array'],
        ]);

        $tournament->update($validated);
        
        if($request->file('symbol')){
            $path = Storage::disk('public')->put('symbols', $request->file('symbol'));
            $tournament->update(['symbol' => asset($path)]);
        }
        if($request->file('image')){
            $path = Storage::disk('public')->put('images', $request->file('image'));
            $tournament->update(['image' => asset($path)]);
        }

        if($request->has('teams')){
            $tournament->teams()->sync($request->get('teams'));
        }

        return redirect()->route('tournament.edit', $tournament->id)->with('success', 'Torneo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return redirect()->route('tournament.index')->with('success', 'Torneo eliminado con éxito');
    }
}
