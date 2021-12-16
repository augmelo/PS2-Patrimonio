<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use App\Models\Component;
use Illuminate\Http\Request;
use App\Http\Requests\ComponentRequest;
use DB;
use Exception;

class ComponentController extends Controller
{
    public function index(Request $request)
    {
        $components = Component::query();

        if($request->has('pesquisa')) {
            $components->where('name', 'like', '%'.$request->pesquisa.'%');
        }

        $components = $components->orderBy('name')->paginate();

        return view('component.index', compact('components'));
    }

    
    public function create()
    {
        return view('component.create');
    }

    
    public function store(ComponentRequest $request)
    {
        $component = new Component($request->component);

        DB::beginTransaction();

        try {
            $component->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return back()->with('success', 'Componente cadastrado com sucesso!');
    }

    public function edit(Component $component)
    {
        return view('component.edit', compact('component'));
    }

    
    public function update(ComponentRequest $request, Component $component)
    {
        $component->fill($request->component);

        DB::beginTransaction();

        try {
            $component->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return redirect()->route('component.index')->with('success', 'Componente atualizado com sucesso!');
    }

    
    public function destroy(Component $component)
    {
        if($component->types()->exists()) {
            return back()->withInput()->with('error', 'Não foi possível concluir a operação.<br>Existem modelos vinculados a este componente.');
        }

        if($component->patrimonies()->exists()) {
            return back()->withInput()->with('error', 'Não foi possível concluir a operação.<br>Existem patrimônios vinculados a este componente.');
        }

        try {
            $component->delete();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }

        return redirect()->route('component.index')->with('success', 'Componente excluído com sucesso!');
    }
}
