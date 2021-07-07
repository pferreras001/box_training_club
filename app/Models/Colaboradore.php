<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Colaboradore
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $link_web
 * @property string $imagen
 *
 * @package App\Models
 */
class Colaboradore extends Model
{
	protected $table = 'colaboradores';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'link_web',
		'imagen'
	];
}
