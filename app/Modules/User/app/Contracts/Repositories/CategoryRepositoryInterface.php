<?php

namespace Modules\User\App\Contracts\Repositories;

use App\Contracts\Repositories\CategoryRepositoryInterface as BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllCategories(): Collection;
}
