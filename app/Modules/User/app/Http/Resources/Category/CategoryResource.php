<?php

namespace Modules\User\App\Http\Resources\Category;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class CategoryResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return $this->resource->only([
            'id',
            'name',
            'sort_order',
            'image_url',
        ]);
    }
}
