<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Like;
use App\Models\Post;
use App\Models\Privilege;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Like[] $likes
 * @property Collection|Post[] $posts
 * @property Collection|Privilege[] $privileges
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function privileges()
	{
		return $this->hasMany(Privilege::class);
	}
}
