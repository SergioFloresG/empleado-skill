<?php
/**
 * Created by PhpStorm.
 * User: SFGenis
 * Date: 13/11/2018
 * Time: 12:44
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 * @package App\Models
 * @property int    empleado_id
 * @property string nombre
 * @property int    calificacion
 */
class Skill extends Model
{

    const TABLE = 'skills';
    protected $table = self::TABLE;
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;

}