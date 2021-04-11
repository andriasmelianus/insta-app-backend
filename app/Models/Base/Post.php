<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Like;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * 
 * @property int $id
 * @property int|null $parent_post_id
 * @property string $content
 * @property string|null $image_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $user_id
 * 
 * @property Post|null $post
 * @property User $user
 * @property Collection|Like[] $likes
 * @property Collection|Post[] $posts
 *
 * @package App\Models\Base
 */
class Post extends Model
{
	use SoftDeletes;
	protected $table = 'posts';

	protected $casts = [
		'parent_post_id' => 'int',
		'user_id' => 'int'
	];

	public function post()
	{
		return $this->belongsTo(Post::class, 'parent_post_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	public function posts()
	{
		return $this->hasMany(Post::class, 'parent_post_id');
	}
}
