<?php

namespace Chat\Http\Controllers;

use Chat\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(15);
        $roles = \Chat\Role::all();

        return view('user.index', ['users' => $users, 'roles' => $roles]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Chat\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Chat\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Chat\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->role_id = $request->role_id;
        $user->update();

        // Outra forma
        //$user->update(['role_id' => $request->role_id]);


        // a mensagem pode ser retornada de duas formas
        /*
        \Session::flash('flash_message', [
            'message' => 'Usuário '. $user->name .' atualizado com sucesso!',
            'class' => 'alert-success'
        ]);
        //*/

        return Redirect::back()->with('flash_message', [
            'message' => 'Usuário '. $user->name .' atualizado com sucesso!',
            'class' => 'alert-success'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Chat\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
