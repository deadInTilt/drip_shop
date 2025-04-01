<?php

namespace App\Http\Controllers\Admin\Product;

use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        try {
            DB::beginTransaction();
                $product->update($data);

                if (isset($data['tags_ids'])) {
                    $tagsIds = $data['tags_ids'];
                    unset($data['tags_ids']);
                    $product->tags()->sync($tagsIds);
                }
            DB::commit();

            LogHelper::logInfo('Товар {product_id} обновлен пользователем {user_id}', ['product_id' => $product->id, 'user_id' => $request->user()->email]);

            return view('admin.product.show', compact('product'));
        } catch (\Exception $exception) {
            DB::rollBack();
            LogHelper::logError('Ошибка при обновлении товара: ' . $exception->getMessage(), [
                'exception' => $exception,
            ]);
            abort(500, $exception->getMessage());
        }
    }
}
