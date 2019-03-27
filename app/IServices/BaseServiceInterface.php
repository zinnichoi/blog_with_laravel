<?php
/**
 * Created by PhpStorm.
 * User: tiennguyenm5
 * Date: 11/12/2018
 * Time: 9:51 AM
 */

namespace App\IServices;

use App\Models\BaseModel;

interface BaseServiceInterface
{
    /**
     * Create a new model
     *
     * @param BaseModel $model
     * @return mixed
     */
    public function create(BaseModel $model);

    /**
     * Update model
     *
     * @param BaseModel $model
     * @param array $data
     * @return mixed
     */
    public function update(BaseModel $model, array $data);

    /**
     * Delete model
     *
     * @param BaseModel $model
     * @return mixed
     */
    public function delete(BaseModel $model);
}
