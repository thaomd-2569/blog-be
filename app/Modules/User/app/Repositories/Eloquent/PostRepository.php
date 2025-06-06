<?php

namespace Modules\User\App\Repositories\Eloquent;

use App\Repositories\Eloquent\PostRepository as BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Modules\User\App\Contracts\Repositories\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getPostsByConditions($conditions = []): Paginator
    {
        return $this->model
            ->newQuery()
            ->with([
                'category' => function ($query) {
                    $query->select(['id', 'name']);
                },
                'tags' => function ($query) {
                    $query->select(['tags.id', 'name']);
                },
            ])
            ->where('posts.is_active', true)
            ->when(isset($conditions['category_id']), function ($query) use ($conditions) {
                $query->where('category_id', $conditions['category_id']);
            })
            ->when(isset($conditions['keyword']), function ($query) use ($conditions) {
                $query->where(function ($query) use ($conditions) {
                    $query->where('title', 'like', '%'.$conditions['keyword'].'%')
                        ->orWhere('content', 'like', '%'.$conditions['keyword'].'%')
                        ->orWhere('description', 'like', '%'.$conditions['keyword'].'%')
                        ->orwhereHas('tags', function ($query) use ($conditions) {
                            $query->where('name', 'like', '%'.$conditions['keyword'].'%');
                        });
                });
            })
            ->orderBy('view_count', 'desc')
            ->paginate(6);
    }
}
