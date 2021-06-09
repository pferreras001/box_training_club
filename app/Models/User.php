<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property bool $confirmed
 * @property string $confirmation_code
 * @property string $recovery_code
 * @property Carbon $birth_date
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'confirmed' => 'bool'
	];

	protected $dates = [
		'birth_date'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'surname',
		'email',
		'password',
		'confirmed',
		'confirmation_code',
		'recovery_code',
		'birth_date'
	];
}
