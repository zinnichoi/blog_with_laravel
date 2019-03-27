<?php

namespace App\IServices;

use App\Models\Blog;

interface BlogServiceInterface extends BaseServiceInterface
{
    /**
     * If user can do $action
     *  return true
     * else
     *  return false
     *
     * @param string $action
     * @param Blog $blog
     * @return mixed
     */
    public function canDo(string $action, Blog $blog);

    /**
     * Get blogs and users who create that blog
     *
     * @return array
     */
    public function getAll();

    /**
     * Filter blog by column and value
     *
     * @param string $column
     * @param int $value
     * @return mixed
     */
    public function filter(string $column, int $value);

    /**
     * Search blog
     *
     * @param array $data
     * @return mixed
     */
    public function search(array $data);
}
