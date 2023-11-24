<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function image($image_id)
    {
        if (($image_id >= 1) && ($image_id <= config('constants.image_count'))) {
            return view('image', ['image_id'=>$image_id]);
        } else {
            return abort(404);
        }
    }

    public function noImageId()
    {
        return self::index();
    }
}
