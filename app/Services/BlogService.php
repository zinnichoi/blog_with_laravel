<?php

namespace App\Services;

use App\IRepositories\BlogRepositoryInterface;
use App\IRepositories\UserRepositoryInterface;
use App\IServices\BlogServiceInterface;
use App\IServices\UploadFileServiceInterface;
use App\Models\BaseModel;
use App\Models\Blog;
use App\Ulti\Constants;
use Illuminate\Support\Facades\Auth;

class BlogService implements BlogServiceInterface
{
    private $blogRepositoryInterface;
    private $uploadServiceInterface;
    private $userRepositoryInterface;

    /**
     * BlogService constructor.
     *
     * @param $blogRepositoryInterface
     * @param $uploadServiceInterface
     * @param $userRepositoryInterface
     */
    public function __construct(
        UploadFileServiceInterface $uploadServiceInterface,
        UserRepositoryInterface $userRepositoryInterface,
        BlogRepositoryInterface $blogRepositoryInterface
    ) {
        $this->blogRepositoryInterface = $blogRepositoryInterface;
        $this->uploadServiceInterface = $uploadServiceInterface;
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

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
    public function canDo(string $action, Blog $blog)
    {
        $user = Auth::user();
        return $user->can($action, [$blog, $user]);
    }

    /**
     * Create a new model
     *
     * @param BaseModel $model
     * @return bool|\Illuminate\Contracts\Validation\Validator|mixed
     */
    public function create(BaseModel $model)
    {
        $filename = $this
            ->uploadServiceInterface
            ->saveFile($model->getAttribute('blog_thumbnail'), Constants::BLOG_DESTINATION_PATH);
        $model->setAttribute('blog_thumbnail', $filename);
        return $this->blogRepositoryInterface->create($model);
    }

    /**
     * Update model
     *
     * @param BaseModel $model
     * @param array $data
     * @return bool|\Illuminate\Contracts\Validation\Validator|mixed
     */
    public function update(BaseModel $model, array $data)
    {
        if (isset($data['blog_thumbnail'])) {
            $filename = $this
                ->uploadServiceInterface
                ->saveFile($data['blog_thumbnail'], Constants::BLOG_DESTINATION_PATH);
        } else {
            $filename = $model->getAttribute('blog_thumbnail');
        }
        $data['blog_thumbnail'] = $filename;
        return $this->blogRepositoryInterface->update($model, $data);
    }

    /**
     * Delete model
     *
     * @param BaseModel $model
     * @return mixed
     */
    public function delete(BaseModel $model)
    {
        return $this->blogRepositoryInterface->delete($model);
    }

    /**
     * Get blogs and users who create that blog
     *
     * @return array
     */
    public function getAll()
    {
        return $this->blogRepositoryInterface->paginate(3);
    }

    /**
     * Filter blog by column and value
     *
     * @param string $column
     * @param int $value
     * @return mixed
     */
    public function filter(string $column, int $value)
    {
        $perPage = 3;
        $operator = '<=';
        if ($column == "age_limit") {
            if ($value == 0) {
                $operator = '>=';
            }
            return $this->blogRepositoryInterface->filter($column, $operator, $value, $perPage);
        }
        if ($value != 2) {
            $operator = '=';
        }
        return $this->blogRepositoryInterface->filter($column, $operator, $value, $perPage);
    }

    /**
     * Search blog
     *
     * @param array $data
     * @return mixed
     */
    public function search(array $data)
    {
        return $this->blogRepositoryInterface->search($data);
    }
}
