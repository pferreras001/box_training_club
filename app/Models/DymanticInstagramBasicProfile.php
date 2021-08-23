<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DymanticInstagramBasicProfile
 * 
 * @property int $id
 * @property string $username
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class DymanticInstagramBasicProfile extends Model
{
	protected $table = 'dymantic_instagram_basic_profiles';

	protected $fillable = [
		'username'
	];
}
