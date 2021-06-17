<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blogentry
 * 
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $texto
 * @property boolean $image
 * @property string|null $etiquetas
 * @property string $autor
 * @property Carbon $fecha
 *
 * @package App\Models
 */
class Blogentry extends Model
{
	protected $table = 'blogentrys';
	public $timestamps = false;

	protected $casts = [
		'image' => 'boolean'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'titulo',
		'descripcion',
		'texto',
		'image',
		'etiquetas',
		'autor',
		'fecha'
	];
}
