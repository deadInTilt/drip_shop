<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class EditController extends Controller
{
    public function __invoke(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }
}
