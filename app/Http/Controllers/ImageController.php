<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
    public function __construct()
    {
    }

    public function getImage($filepath)
    {
        $path = public_path() . '/images/' . $filepath;
        return Response::download($path);
    }
}
