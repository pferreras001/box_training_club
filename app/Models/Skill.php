<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 * 
 * @property int $id
 * @property int $user_mail
 * @property int $skill_name
 * @property int $trofeos
 *
 * @package App\Models
 */
class Skill extends Model
{
	protected $table = 'skills';
	public $timestamps = false;

	protected $fillable = [
		'user_mail',
		'skill_name',
		'trofeos'
	];
}
