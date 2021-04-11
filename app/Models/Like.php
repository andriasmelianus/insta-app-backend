<?php

namespace App\Models;

use App\Models\Base\Like as BaseLike;

class Like extends BaseLike
{
	protected $fillable = [
		'user_id',
		'post_id'
	];
}
