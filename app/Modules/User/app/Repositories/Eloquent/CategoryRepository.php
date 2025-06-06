<?php

namespace Modules\User\App\Repositories\Eloquent;

use App\Repositories\Eloquent\CategoryRepository as BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\App\Contracts\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getAllCategories(): Collection
    {
        return $this->model
            ->newQuery()
            ->orderBy('sort_order')
            ->get();
    }
}
