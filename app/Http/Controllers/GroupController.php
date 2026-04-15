<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with('users', 'tournament')->orderBy('name', 'ASC')->get();
        
        return Inertia::render('Group/Index', [
            'groups' => $groups,
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
        
        return Inertia::render('Group/Create', [
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
            'description' => 'nullable|string|max:1000',
            'tournament_id' => 'nullable|exists:tournaments,id',
        ]);

        $group = Group::create($request->all());
        $group->token_invitation = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        $group->users()->sync(Auth::user()->id);        
        $group->save();
        
        return redirect()->route('group.index')->with('success', 'Grupo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $group->load('users', 'tournament');
        
        return Inertia::render('Group/Show', [
            'group' => $group,
            'auth' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $group->load('tournament');
        $tournaments = Tournament::orderBy('name', 'DESC')->get(['id', 'name']);
        
        return Inertia::render('Group/Edit', [
            'group' => $group,
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
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'tournament_id' => 'nullable|exists:tournaments,id',
        ]);

        $group->fill($request->all())->save();
        
        return redirect()->route('group.index')->with('success', 'Grupo editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        Group::find($group->id)->delete();
        return redirect()->route('group.index')->with('success', 'Grupo '.$group->name.' fué eliminado con éxito');
    }

    public function unirGrupo($token)
    {
        \Cache::put('invitacion', $token, 5);
        return redirect()->route('group.add', $token);      
    }

    public function relacionarUsuario($token){
        if($group = Group::where('token_invitation','=',$token)->first()){
            foreach($group->users()->get() as $user){
                if($user->id == Auth::user()->id){
                    return redirect()->route('group.index')->with('info', 'Ya perteneces al grupo '.$group->name);
                }
            }
            $group->users()->attach(Auth::user()->id);
            $group->save();
            return redirect()->route('group.index')->with('info', 'Se unió al grupo '.$group->name.' exitosamente.'); 
        }else{
            return redirect()->route('group.index')->with('info', 'El grupo ya no existe.');
        }
    }

}
