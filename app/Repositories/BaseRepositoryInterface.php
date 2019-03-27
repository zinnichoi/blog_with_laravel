<?php
/**
 * Created by PhpStorm.
 * User: tiennguyenm5
 * Date: 11/12/2018
 * Time: 9:11 AM
 */

namespace App\Repositories;

use App\Models\BaseModel;

interface BaseRepositoryInterface
{
    /**
     * Return all row in table and paginate
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Return all row in table and paginate
     *
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage);

    /**
     * Return a single row by column and value
     *
     * @param string $column
     * @param $value
     * @return mixed
     */
    public function getOne(string $column, $value);

    /**
     * Return all row by column and value
     *
     * @param string $column
     * @param string $operator
     * @param $value
     * @param int $perPage
     * @return mixed
     */
    public function filter(string $column, string $operator, $value, int $perPage);

    /**
     * Delete a row
     *
     * @param BaseModel $model
     * @return mixed
     */
    public function delete(BaseModel $model);

    /**
     * Create new row
     *
     * @param BaseModel $model
     * @return mixed
     */
    public function create(BaseModel $model);

    /**
     * Update new row
     *
     * @param BaseModel $model
     * @param array $data
     * @return mixed
     */
    public function update(BaseModel $model, array $data);
}
