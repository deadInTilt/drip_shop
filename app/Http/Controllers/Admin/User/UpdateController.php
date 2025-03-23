<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        try {
            $data = $request->validated();
            $user->update($data);

            return view('admin.user.show', compact('user'));
        }
        catch (QueryException $queryException) {
            return back()->withErrors('Ошибка базы данных: ' . $queryException->getMessage());
        }
        catch (\Exception $exception) {
            return back()->withErrors('Произошла ошибка: ' . $exception->getMessage());
        }
    }
}
