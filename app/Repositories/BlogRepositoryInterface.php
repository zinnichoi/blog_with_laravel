<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

interface BlogRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Return blogs by conditions
     *
     * @param array $data
     * @return mixed
     */
    public function search(array $data);

    /**
     * Append search title to query
     *
     * @param Builder $query
     * @param string $title
     */
    public function scopeSearchTitle(Builder $query, string $title);

    /**
     * Append search content to query
     *
     * @param Builder $query
     * @param string $content
     */
    public function scopeSearchContent(Builder $query, string $content);

    /**
     * Append search age to query
     *
     * @param Builder $query
     * @param string $age
     */
    public function scopeSearchAge(Builder $query, string $age);

    /**
     * Append search author's name to query
     *
     * @param Builder $query
     * @param string $userName
     */
    public function scopeSearchUser(Builder $query, string $userName);
}
