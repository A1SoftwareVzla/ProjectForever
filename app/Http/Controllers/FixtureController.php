<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Inertia\Inertia;


class FixtureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fixtures = Fixture::with('tournament')->orderBy('name','DESC')->get();
        return Inertia::render('Fixture/Index', [
            'fixtures' => $fixtures,
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
        $tournaments = Tournament::orderBy('name', 'DESC')->get(['id', 'name']);
        
        return Inertia::render('Fixture/Create', [
            'tournaments' => $tournaments,
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
            'tournament_id' => 'required|exists:tournaments,id',
        ]);

        $fixture = Fixture::create($request->all());
        
        return redirect()->route('fixture.index')->with('success', 'Fecha creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function show(Fixture $fixture)
    {
        $fixture->load('tournament');
        
        return Inertia::render('Fixture/Show', [
            'fixture' => $fixture,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixture $fixture)
    {
        $fixture->load('tournament');
        $tournaments = Tournament::orderBy('name', 'DESC')->get(['id', 'name']);
        
        return Inertia::render('Fixture/Edit', [
            'fixture' => $fixture,
            'tournaments' => $tournaments,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fixture $fixture)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tournament_id' => 'required|exists:tournaments,id',
        ]);

        $fixture = Fixture::find($fixture->id);
        $fixture->fill($request->all())->save();
        
        return redirect()->route('fixture.index')->with('success', 'Fecha actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fixture $fixture)
    {
        Fixture::find($fixture->id)->delete();
        return redirect()->route('fixture.index')->with('success', 'Fecha '.$fixture->name.' fué eliminada con éxito');    
    }
}
