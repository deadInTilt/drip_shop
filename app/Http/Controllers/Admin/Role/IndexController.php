<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class IndexController extends Controller
{
    public function __invoke()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
}
