<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DymanticInstagramFeedToken
 * 
 * @property int $id
 * @property int $profile_id
 * @property string $access_code
 * @property string $username
 * @property string $user_id
 * @property string $user_fullname
 * @property string $user_profile_picture
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class DymanticInstagramFeedToken extends Model
{
	protected $table = 'dymantic_instagram_feed_tokens';

	protected $casts = [
		'profile_id' => 'int'
	];

	protected $fillable = [
		'profile_id',
		'access_code',
		'username',
		'user_id',
		'user_fullname',
		'user_profile_picture'
	];
}
