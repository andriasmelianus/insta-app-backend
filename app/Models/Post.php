<?php

namespace App\Models;

use App\Models\Base\Post as BasePost;

class Post extends BasePost
{
	protected $fillable = [
		'parent_post_id',
		'content',
		'image_url',
		'user_id'
	];
}
