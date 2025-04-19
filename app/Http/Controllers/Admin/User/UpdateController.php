<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Services\Logger\LoggerInterface;
use Illuminate\Database\QueryException;

class UpdateController extends Controller
{
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        try {
            $user->update($data);

            $this->logger->info('Пользователь {id} обновлен', ['id' => $request->user()->id]);

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
