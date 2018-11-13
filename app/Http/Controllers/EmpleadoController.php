<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Http\Resources\EmpleadoCollection;
use App\Http\Resources\EmpleadoResource;
use App\Models\Empleado;
use App\Models\Skill;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $pagination = Empleado::query()
            ->with('skills')
            ->paginate(100);
        return EmpleadoResource::collection($pagination);
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return EmpleadoResource
     */
    public function store(EmpleadoRequest $request)
    {
        $files = $request->all();
        $files_skills = $files['skills'];
        unset($files['skills']);

        $empleado = new Empleado();
        $empleado->forceFill($files);

        $skills = [];
        foreach ($files_skills as $k => $v) {
            $skill = new Skill();
            $skill->nombre = $k;
            $skill->calificacion = $v;
            $skills[] = $skill;
            unset($skill);
        }


        DB::transaction(function() use ($empleado, $skills){
           $empleado->saveOrFail();
           $empleado->skills()->saveMany($skills);
        });

        return new EmpleadoResource($empleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado $empleado
     *
     * @return EmpleadoResource
     */
    public function show(Empleado $empleado)
    {
        return new EmpleadoResource($empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado $empleado
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Empleado     $empleado
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado $empleado
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
