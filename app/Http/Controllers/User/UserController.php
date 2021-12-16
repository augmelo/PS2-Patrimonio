<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use DB;
use Exception;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        if($request->has('pesquisa')) {
            $users->where('name', 'like', '%'.$request->pesquisa.'%');
        }

        $users = $users->orderBy('name')->paginate();

        return view('user.index', compact('users'));
    }

    
    public function create()
    {
        return view('user.create');
    }

    
    public function store(UserRequest $request)
    {
        $user = new User($request->user);

        DB::beginTransaction();

        try {
            $user->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return back()->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->user);

        DB::beginTransaction();

        try {
            $user->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    
    public function destroy(User $user)
    {
        if($user->patrimonies()->exists()) {
            return back()->withInput()->with('error', 'Não foi possível concluir a operação.<br>Existem patrimônios vinculados a este usuário.');
        }

        try {
            $user->delete();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }

        return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
    }

}
