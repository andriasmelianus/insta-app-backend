<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Privilege
 * 
 * @property int $id
 * @property int $user_id
 * @property bool $enable_post
 * @property bool $enable_like
 * @property bool $enable_comment
 * 
 * @property User $user
 *
 * @package App\Models\Base
 */
class Privilege extends Model
{
	protected $table = 'privileges';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'enable_post' => 'bool',
		'enable_like' => 'bool',
		'enable_comment' => 'bool'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
