<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;

class IndexController extends Controller
{
    public function __invoke()
    {
        $groups = Group::all();
        return view('admin.group.index', compact('groups'));
    }
}
