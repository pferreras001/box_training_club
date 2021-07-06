<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string|null $password
 * @property bool $confirmed
 * @property string $confirmation_code
 * @property string $recovery_code
 * @property Carbon $birth_date
 * @property string|null $remember_token
 *
 * @package App\Models
 */
class User extends Model implements AuthenticatableContract 
{
    use Authenticatable;
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'confirmed' => 'bool'
	];

	protected $dates = [
		'birth_date'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'surname',
		'email',
		'password',
		'confirmed',
		'confirmation_code',
		'recovery_code',
		'birth_date',
		'remember_token'
	];
}