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
 * @property string $user_mail
 * @property string $skill_name
 * @property string $trofeos
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
