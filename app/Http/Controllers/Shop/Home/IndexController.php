<?php

namespace App\Http\Controllers\Shop\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('shop.home.index');
    }
}
