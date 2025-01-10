<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);
        return view('pages.user.index')->with('users', $users);
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso');
    }

    public function edit($id)
    {
        if(!$user = User::find($id)){
            return redirect()->route('user.index');
        }
        $user = User::find($id);
        return view('pages.user.edit')->with('user', $user);
    }

    public function update(StoreUpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso');
    }

}
