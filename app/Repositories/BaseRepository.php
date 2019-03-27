<?php
/**
 * Created by PhpStorm.
 * User: tiennguyenm5
 * Date: 11/12/2018
 * Time: 9:13 AM
 */

namespace App\Repositories;

use App\IRepositories\BaseRepositoryInterface;
use App\Models\BaseModel;
use Illuminate\Container\Container as App;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var $model
     */
    protected $model;

    /**
     * @var App
     */
    protected $app;

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * BaseRepository constructor.
     *
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        return $this->model = $model->newQuery();
    }


    /**
     * Return all row in table and paginate
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /**
     * Return all row in table and paginate
     *
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage)
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Return a single row by column and value
     *
     * @param string $column
     * @param $value
     * @return mixed
     */
    public function getOne(string $column, $value)
    {
        return $this->model->where($column, $value)->first();
    }

    /**
     * Return all row by column and value
     *
     * @param string $column
     * @param string $operator
     * @param $value
     * @param int $perPage
     * @return mixed
     */
    public function filter(string $column, string $operator, $value, int $perPage)
    {
        return $this->model->where($column, $operator, $value)->paginate($perPage);
    }

    /**
     * Soft delete a row
     *
     * @param BaseModel $model
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function delete(BaseModel $model)
    {
        $data['is_delete'] = 1;
        return $this->update($model, $data);
    }

    /**
     * Create new row
     *
     * @param BaseModel $model
     * @return mixed
     */
    public function create(BaseModel $model)
    {
        return $model->save();
    }

    /**
     * Update new row
     *
     * @param BaseModel $model
     * @param array $data
     * @return bool|mixed
     */
    public function update(BaseModel $model, array $data)
    {
        return $model->update($data);
    }
}
