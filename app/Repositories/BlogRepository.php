<?php

namespace App\Repositories;

use App\IRepositories\BlogRepositoryInterface;
use App\Models\Blog;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Blog::class;
    }

    /**
     * Return blogs by conditions
     *
     * @param array $data
     * @return mixed
     */
    public function search(array $data)
    {
        $query = $this->model;
        if (isset($data['name'])) {
            $this->scopeSearchUser($query, $data['name']);
        }
        if (isset($data['title'])) {
            $this->scopeSearchTitle($query, $data['title']);
        }
        if (isset($data['content'])) {
            $this->scopeSearchContent($query, $data['content']);
        }
        $this->scopeSearchAge($query, $data['age_limit']);
        return $query->paginate(3);
    }

    /**
     * Append search title to query
     *
     * @param Builder $query
     * @param string $title
     */
    public function scopeSearchTitle(Builder $query, string $title)
    {
        $query->where('blogs.title', 'LIKE', "%$title%");
    }

    /**
     * Append search content to query
     *
     * @param Builder $query
     * @param string $content
     */
    public function scopeSearchContent(Builder $query, string $content)
    {
        $query->where('blogs.content', 'LIKE', "%$content%");
    }

    /**
     * Append search age to query
     *
     * @param Builder $query
     * @param string $age
     */
    public function scopeSearchAge(Builder $query, string $age)
    {
        $operator = '<=';
        if ($age == 0) {
            $operator = '>=';
        }
        $query->where('blogs.age_limit', $operator, $age);
    }

    /**
     * Append search author's name to query
     *
     * @param Builder $query
     * @param string $userName
     */
    public function scopeSearchUser(Builder $query, string $userName)
    {
        $query
            ->with('user')
            ->join('users', 'users.id', '=', 'blogs.user_id')
            ->where('users.name', 'LIKE', "%$userName%");
    }
}
