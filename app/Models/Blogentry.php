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
 * @property string $texto
 * @property string|null $etiquetas
 * @property string $autor
 * @property Carbon $fecha
 * @property string $image
 *
 * @package App\Models
 */
class Blogentry extends Model
{
	protected $table = 'blogentrys';
	public $timestamps = false;

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'titulo',
		'texto',
		'etiquetas',
		'autor',
		'fecha',
		'image'
	];
}
