<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceRequest;
use DB;
use Exception;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $places = Place::query();

        if($request->has('pesquisa')) {
            $places->where('name', 'like', '%'.$request->pesquisa.'%');
        }

        $places = $places->orderBy('name')->paginate();

        return view('place.index', compact('places'));
    }

    
    public function create()
    {
        return view('place.create');
    }

    
    public function store(PlaceRequest $request)
    {
        $place = new Place($request->place);

        DB::beginTransaction();

        try {
            $place->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return back()->with('success', 'Local cadastrado com sucesso!');
    }

    public function edit(Place $place)
    {
        return view('place.edit', compact('place'));
    }

    
    public function update(PlaceRequest $request, Place $place)
    {
        $place->fill($request->place);

        DB::beginTransaction();

        try {
            $place->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return redirect()->route('place.index')->with('success', 'Local atualizado com sucesso!');
    }

    
    public function destroy(Place $place)
    {
        if($place->patrimonies()->exists()) {
            return back()->withInput()->with('error', 'Não foi possível concluir a operação.<br>Existem patrimônios vinculados a este local.');
        }

        try {
            $place->delete();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }

        return redirect()->route('place.index')->with('success', 'Local excluído com sucesso!');
    }
}
