<?php

namespace App\Http\Resources;

use App\Models\Empleado;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class EmpleadoResource
 * @package App\Http\Resources
 * @property Empleado $resource
 */
class EmpleadoResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->resource->only(['id', 'nombre', 'email', 'puesto', 'direccion']);

        $skills = $this->resource->skills;

        $data = array_merge($data, [
            'nacimiento' => $this->resource->nacimiento->format('Y-m-d'),
            'skils'      => SkillResource::collection($skills),
            'links'      => [
                'self' => route('empleado.show', ['empleado' => $this->resource->id])
            ]
        ]);

        return $data;
    }
}
