<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);

        return view('admin.role.show', compact('role'));
    }
}
