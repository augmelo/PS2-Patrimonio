<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommomUserRequest;
use Auth;
use DB;
use Exception;

class CommomUserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('commom_user.edit', compact('user'));
    }

    public function update(CommomUserRequest $request)
    {
        $user = Auth::user();

        DB::beginTransaction();

        try {
            $user->password = $request->user['password'];
            $user->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        
        return back()->with('success', 'Senha atualizada com sucesso!');
    }
}
