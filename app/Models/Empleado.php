<?php
/**
 * Created by PhpStorm.
 * User: SFGenis
 * Date: 13/11/2018
 * Time: 12:42
 */

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 * @package App\Models
 * @property int    id
 * @property string nombre
 * @property string email
 * @property string puesto
 * @property Carbon nacimiento
 * @property string direccion
 *
 */
class Empleado extends Model
{

    const TABLE = 'empleados';
    protected $table = self::TABLE;

    protected $dates = ['nacimiento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills()
    {
        return $this->hasMany(Skill::class, 'empleado_id', 'id');
    }

}