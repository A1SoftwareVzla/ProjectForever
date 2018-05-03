<?php

namespace App\Http\Controllers;

use App\Fixture;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Requests\FixtureStoreRequest;
use App\Http\Requests\FixtureUpdateRequest;


class FixtureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fixtures = Fixture::orderBy('name','DESC')->paginate();
        $tournaments = Tournament::orderBy('name', 'DESC')->pluck('name','id');
        return view('admin.fixture.index')->with(compact('fixtures', 'tournaments'));
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
    public function store(FixtureStoreRequest $request)
    {        
        $fixture = Fixture::create($request->all());        
        return redirect()->route('fixture.index')->with('info','fecha creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function show(Fixture $fixture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixture $fixture)
    {
        $tournaments = Tournament::orderBy('name', 'DESC')->pluck('name','id');
        return view('admin.fixture.edit')->with(compact('fixture', 'tournaments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function update(FixtureUpdateRequest $request, Fixture $fixture)
    {
        $fixture = Fixture::find($fixture->id);
        $fixture->fill($request->all())->save();
        return redirect()->route('fixture.edit', $fixture->id)->with('info','Fecha actualizada con éxito');
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
        return redirect()->route('fixture.index')->with('info','fecha '.$fixture->name.' fué eliminada con éxito');    
    }
}
