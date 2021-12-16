<?php

namespace App\Http\Controllers\Type;

use App\Http\Controllers\Controller;
use App\Models\{Type, Component};
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use DB;
use Exception;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $types = Type::query();

        if($request->has('pesquisa')) {
            $types->where('name', 'like', '%'.$request->pesquisa.'%');
        }

        $types = $types->orderBy('name')->paginate();

        return view('type.index', compact('types'));
    }

    
    public function create()
    {
        $components = Component::all();

        return view('type.create', compact('components'));
    }

    
    public function store(TypeRequest $request)
    {
        $type = new Type($request->type);

        DB::beginTransaction();

        try {
            $type->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return back()->with('success', 'Modelo cadastrado com sucesso!');
    }

    public function edit(Type $type)
    {
        $components = Component::all();

        return view('type.edit', compact('type', 'components'));
    }

    
    public function update(TypeRequest $request, Type $type)
    {
        $type->fill($request->type);

        DB::beginTransaction();

        try {
            $type->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return redirect()->route('type.index')->with('success', 'Modelo atualizado com sucesso!');
    }

    
    public function destroy(Type $type)
    {
        if($type->patrimonies()->exists()) {
            return back()->withInput()->with('error', 'Não foi possível concluir a operação.<br>Existem patrimônios vinculados a este modelo.');
        }

        try {
            $type->delete();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }

        return redirect()->route('type.index')->with('success', 'Modelo excluído com sucesso!');
    }
}
