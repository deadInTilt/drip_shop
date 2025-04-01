<?php

namespace App\Http\Controllers\Admin\Product;

use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $tagsIds = $data['tags_ids'];
        unset($data['tags_ids']);

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        try {
            DB::beginTransaction();

                $product = Product::firstOrCreate([
                    'title' => $data['title']
                ], $data);

                $product->tags()->sync($tagsIds);

            DB::commit();

            return redirect()->route('admin.product.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            LogHelper::logError('Ошибка при создании товара: ' . $exception->getMessage(), [
                'exception' => $exception,
            ]);
            abort(500);
        }
    }
}
