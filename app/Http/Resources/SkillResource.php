<?php

namespace App\Http\Resources;

use App\Models\Skill;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class SkillResource
 * @package App\Http\Resources
 * @property Skill $resource
 */
class SkillResource extends Resource
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
        return $this->resource->only(['nombre', 'calificacion']);
    }
}
