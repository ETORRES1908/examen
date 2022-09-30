<?php

namespace App\Http\Controllers;

use App\Models\Businessprofile;
use App\Models\Contractprofile;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $profiles = DB::table('profiles')
        ->join('businessprofiles','profiles.bu_pro_id','=','businessprofiles.id')
        ->where('businessprofiles.area','LIKE','%'. $request->buscar .'%')
        ->orWhere('businessprofiles.cargo','LIKE','%'. $request->buscar .'%')
        ->orWhere('businessprofiles.local','LIKE','%'. $request->buscar .'%')
        ->paginate();
        $contrato = DB::table('contractprofiles')->get();
        $data = [
            "profiles" => $profiles,
            "contrato" =>$contrato
        ];

        return view('profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = new Profile();
        return view('profile.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'dni' => 'required|unique:profiles|max:8',
            'correo' => 'required|max:100',
            'fecha_nac' => 'required|date',
            'area' => 'required|max:100',
            'cargo' => 'required|max:100',
            'local' => 'required|max:100',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'tipo' => 'required|max:1',
        ]);


        $bs = Businessprofile::create([
            'area' => $request->area,
            'cargo' => $request->cargo,
            'local' => $request->local,
        ]);
        $ct = Contractprofile::create([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'tipo' => $request->tipo,
        ]);

        $pr = Profile::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'correo' => $request->correo,
            'fecha_nac' => $request->fecha_nac,
            'bu_pro_id' => $bs->id,
            'co_pro_id' => $ct->id,
        ]);

        return redirect()->to('profiles')
        ->with('success', 'Empleado creado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);

        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'dni' => 'required|unique:profiles,dni,' . $profile->id . '|max:8',
            'correo' => 'required|max:100',
            'fecha_nac' => 'required|date',
            'area' => 'required|max:100',
            'cargo' => 'required|max:100',
            'local' => 'required|max:100',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'tipo' => 'required|max:1',
        ]);

        $profile->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'correo' => $request->correo,
            'fecha_nac' => $request->fecha_nac,
        ]);
        $profile->businessprofile()->update([
            'area' => $request->area,
            'cargo' => $request->cargo,
            'local' => $request->local,
        ]);
        $profile->contractprofile()->update([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'tipo' => $request->tipo,
        ]);

        return redirect()->to('profiles')
        ->with('success', 'Se guardaron los datos correctamente!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->contractprofile()->delete();
        $profile->businessprofile()->delete();
        $profile->delete();

        return redirect()->to('profiles')
        ->with('success', 'Empleado eliminado correctamente!');
    }
}
