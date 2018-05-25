<?php

namespace App\Http\Controllers;

use App\Group;
use App\Tournament;
use App\Http\Requests\GroupStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupStoreRequest $request)
    {
        $group = Group::create($request->all());
        $group->token_invitation = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        $group->users()->sync(Auth::user()->id);        
        $group->save();
        return redirect()->route('group.index')->with('info','Grupo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('user.group.show')->with(compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('user.group.edit')->with(compact('group'));
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
        $group->fill($request->all())->save();
        return redirect()->route('group.edit', $group->id)->with('info','Grupo editado con éxito');
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
        return redirect()->route('group.index')->with('info','Grupo '.$group->name.' fué eliminado con éxito');
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
