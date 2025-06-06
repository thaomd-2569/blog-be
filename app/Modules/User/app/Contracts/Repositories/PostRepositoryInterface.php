<?php

namespace Modules\User\App\Contracts\Repositories;

use App\Contracts\Repositories\PostRepositoryInterface as BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function getPostsByConditions($conditions = []): Paginator;
}
