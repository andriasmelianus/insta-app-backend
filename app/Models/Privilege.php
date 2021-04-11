<?php

namespace App\Models;

use App\Models\Base\Privilege as BasePrivilege;

class Privilege extends BasePrivilege
{
	protected $fillable = [
		'user_id',
		'enable_post',
		'enable_like',
		'enable_comment'
	];
}
