<?php

namespace App\Http\Controllers\Admin\User;

use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $password = Str::random(8);
        $data['password'] = Hash::make($password);

        unset($data['password_confirmation']);

        try {
            DB::beginTransaction();
                $user = User::firstOrCreate([
                    'email' => $data['email'],
                ], $data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            LogHelper::logError('Ошибка при создании пользователя' . $exception->getMessage() . ' - #' . $exception->getCode(), [
                'exception' => $exception]);
            abort(500);
        }

        Mail::to($data['email'])->send(new PasswordMail($password));

        event(new Registered($user));

        return redirect()->route('admin.user.index');
    }
}
