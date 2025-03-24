<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();
                $data = $request->validated();

                $tagsIds = $data['tags_ids'];
                unset($data['tags_ids']);

                if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
                }

                $product->update($data);

                $product->tags()->sync($tagsIds);
            DB::commit();

            return view('admin.product.show', compact('product'));
        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error('Ошибка в методе update: ' . $exception->getMessage(), [
                'exception' => $exception,
            ]);
            abort(500);
        }
    }
}
