<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Nacionalidad;
use App\Models\PuebloOriginario;
use App\Models\Previcion;
use App\Models\Familia;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $pacientes = Paciente::with([
        'sector',
        'nacionalidad',
        'puebloOriginario',
        'previcion',
        'familia' // si tienes relación definida como familia()
    ])->get();

    return view('paciente.listaPaciente', [
        'pacientes' => $pacientes,
        'sectores' => Sector::all(),
        'nacionalidades' => Nacionalidad::all(),
        'pueblos' => PuebloOriginario::all(),
        'previciones' => Previcion::all(),
        'familias' => Familia::all(),
    ]);
        
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
      try {
        $validated = $request->validate([
            'rut_paciente' => 'required|unique:pacientes',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required|in:Masculino,Femenino',
            'fecha_nacimiento' => 'required|date',
            'num_ficha' => 'required',
            'estado' => 'required|in:Inscrito,Trasladado,Fallecido',
            'id_sector' => 'required|exists:sectores,id',
            'id_nacionalidad' => 'required|exists:nacionalidad,id',
            'id_pueblo_originario' => 'required|exists:pueblo_originario,id',
            'id_previcion' => 'required|exists:previcion,id',
            'cod_familia' => 'required|exists:familias,cod_familia',
        ]);

        Paciente::create($validated);

    return redirect()->route('pacientes.index')->with('console_log', 'Paciente guardado correctamente');

    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors());
    }
    
    

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
