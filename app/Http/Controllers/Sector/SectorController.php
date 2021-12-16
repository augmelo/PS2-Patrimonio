<?php

namespace App\Http\Controllers\Sector;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;
use App\Http\Requests\SectorRequest;
use DB;
use Exception;

class SectorController extends Controller
{
    public function index(Request $request)
    {
        $sectors = Sector::query();

        if($request->has('pesquisa')) {
            $sectors->where('name', 'like', '%'.$request->pesquisa.'%');
        }

        $sectors = $sectors->orderBy('name')->paginate();

        return view('sector.index', compact('sectors'));
    }

    
    public function create()
    {
        return view('sector.create');
    }

    
    public function store(SectorRequest $request)
    {
        $sector = new Sector($request->sector);

        DB::beginTransaction();

        try {
            $sector->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return back()->with('success', 'Setor cadastrado com sucesso!');
    }

    public function edit(Sector $sector)
    {
        return view('sector.edit', compact('sector'));
    }

    
    public function update(SectorRequest $request, Sector $sector)
    {
        $sector->fill($request->sector);

        DB::beginTransaction();

        try {
            $sector->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return redirect()->route('sector.index')->with('success', 'Setor atualizado com sucesso!');
    }

    
    public function destroy(Sector $sector)
    {
        if($sector->patrimonies()->exists()) {
            return back()->withInput()->with('error', 'Não foi possível concluir a operação.<br>Existem patrimônios vinculados a este setor.');
        }

        try {
            $sector->delete();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }

        return redirect()->route('sector.index')->with('success', 'Setor excluído com sucesso!');
    }
}
