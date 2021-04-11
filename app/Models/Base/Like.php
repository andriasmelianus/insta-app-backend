<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Like
 * 
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Post $post
 * @property User $user
 *
 * @package App\Models\Base
 */
class Like extends Model
{
	protected $table = 'likes';

	protected $casts = [
		'user_id' => 'int',
		'post_id' => 'int'
	];

	public function post()
	{
		return $this->belongsTo(Post::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
