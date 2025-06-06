<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\App\Http\Resources\Category\CategoryCollection;
use Modules\User\App\Services\CategoryService;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request): CategoryCollection
    {
        return new CategoryCollection(
            $this->categoryService->getAllCategories(),
            __FUNCTION__
        );
    }
}
