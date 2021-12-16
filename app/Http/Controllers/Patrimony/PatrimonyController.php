<?php

namespace App\Http\Controllers\Patrimony;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Patrimony,
    Component,
    Type,
    Place,
    Sector,
    User
};
use App\Http\Requests\{
    PatrimonySearchRequest, 
    PatrimonyRequest,
};
use DB;
use Exception;

class PatrimonyController extends Controller
{

    public function _construct()
    {
        // $this->middleware('auth');
        // $this->middleware('permission:manage-posts', ['only' => ['create']]);
        // $this->middleware('permission:edit-posts',   ['only' => ['edit']]);
        // $this->middleware('permission:view-posts',   ['only' => ['show', 'index']]);

        $this->middleware('user.commom')->only('index');
    }

    public function index(PatrimonySearchRequest $request)
    {
        $searchFilter = null;
        $search = null;
        $patrimonies = Patrimony::with(['component', 'type', 'place', 'sector']);
        
        if($request->has('filtro') && $request->has('pesquisa')) {
            
            $searchFilter = $request->filtro;
            $search = $request->pesquisa;

            switch ($searchFilter) {
                case 'patrimonio':
                    
                    $patrimonies->where('number', 'like', '%'.$search.'%');

                    break;
                
                case 'componente':
                    
                    $patrimonies->whereHas('component', function($query) use ($search){
                        $query->where('name', 'like', '%'.$search.'%');
                    });

                    break;

                case 'modelo':
                
                    $patrimonies->whereHas('type', function($query) use ($search){
                        $query->where('name', 'like', '%'.$search.'%');
                    });

                    break;

                case 'ip':
            
                    $patrimonies->where('ip', 'like', '%'.$search.'%');

                    break;

                case 'local':
            
                    $patrimonies->whereHas('place', function($query) use ($search){
                        $query->where('name', 'like', '%'.$search.'%');
                    });

                    break;

                case 'setor':
        
                    $patrimonies->whereHas('sector', function($query) use ($search){
                        $query->where('name', 'like', '%'.$search.'%');
                    });

                    break;

                default:
                    
                    break;
            }

        }

        $patrimonies = $patrimonies->orderBy('number')->paginate();
        
        return view('patrimony.index', compact('patrimonies', 'searchFilter', 'search'));
    }

    public function create()
    {
        $components = Component::orderBy('name')->get();
        $types = Type::orderBy('name')->get();
        $places = Place::orderBy('name')->get();
        $sectors = Sector::orderBy('name')->get();
        $users = User::orderBy('name')->get();

        return view('patrimony.create', compact('components', 'types', 'places', 'sectors', 'users'));
    }

    public function edit(Patrimony $patrimony)
    {
        $components = Component::orderBy('name')->get();
        $types = Type::orderBy('name')->get();
        $places = Place::orderBy('name')->get();
        $sectors = Sector::orderBy('name')->get();
        $users = User::orderBy('name')->get();

        return view('patrimony.edit', compact('patrimony', 'components', 'types', 'places', 'sectors', 'users'));
    }

    public function store(PatrimonyRequest $request)
    {
        $patrimony = new Patrimony($request->patrimony);

        DB::beginTransaction();

        try {
            $patrimony->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return back()->with('success', 'Patrimônio cadastrado com sucesso!');
    }

    public function update(PatrimonyRequest $request, Patrimony $patrimony)
    {
        $patrimony->fill($request->patrimony);

        DB::beginTransaction();

        try {
            $patrimony->save();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }
        

        return redirect()->route('patrimony.index')->with('success', 'Patrimônio atualizado com sucesso!');
    }

    public function destroy(Patrimony $patrimony)
    {
        try {
            $patrimony->delete();

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

            return back()->withInput()->with('error', 'Não foi possível concluir a operação.');

        }

        return redirect()->route('patrimony.index')->with('success', 'Patrimônio excluído com sucesso!');
    }
}
