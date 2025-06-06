<?php

namespace Modules\User\App\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\User\App\Contracts\Repositories\CategoryRepositoryInterface;

class CategoryService
{
    protected CategoryRepositoryInterface $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCategories(): Collection
    {
        return $this->repository->getAllCategories();
    }
}
