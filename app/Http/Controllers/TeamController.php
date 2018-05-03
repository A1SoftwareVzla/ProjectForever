<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TeamStoreRequest;
use App\Http\Requests\TeamUpdateRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('name','ASC')->paginate();
        return view('admin.team.index')->with(compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamStoreRequest $request)
    {
        // verificar si el short_name existe, si existe devolver error
        $team = Team::create($request->all());
        // images
        if($request->file('symbol')){
            $path = Storage::disk('public')->put('symbols', $request->file('symbol'));
            $team->fill(['symbol' => asset($path)])->save();
        }
        return redirect()->route('team.index')->with('info','Equipo guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //dd($team);
        return view('admin.team.edit')->with(compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        //dd($team);
        $team->fill($request->all())->save();

        if($request->file('symbol')){
            $path = Storage::disk('public')->put('symbols', $request->file('symbol'));
            $team->fill(['symbol' => asset($path)])->save();
        }

        return redirect()->route('team.edit', $team->id)->with('info','Equipo editado con éxito');
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
        return redirect()->route('team.index')->with('info','Equipo de '.$team->name.' fué eliminado con éxito');
    }
}
