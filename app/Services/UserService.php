<?php

namespace App\Services;

use App\IRepositories\UserRepositoryInterface;
use App\IServices\UploadFileServiceInterface;
use App\IServices\UserServiceInterface;
use App\Models\BaseModel;
use App\Ulti\Constants;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    private $userRepositoryInterface;
    private $uploadFileServiceInterface;

    /**
     * UserService constructor.
     * @param $userRepositoryInterface
     * @param $uploadFileServiceInterface
     */
    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        UploadFileServiceInterface $uploadFileServiceInterface
    ) {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->uploadFileServiceInterface = $uploadFileServiceInterface;
    }

    /**
     * Create a new model
     *
     * @param BaseModel $model
     * @return bool|\Illuminate\Contracts\Validation\Validator|mixed
     */
    public function create(BaseModel $model)
    {
        $model->setAttribute('password', Hash::make($model->getAttribute('password')));
        $filename = $this
            ->uploadFileServiceInterface
            ->saveFile($model->getAttribute('user_thumbnail'), Constants::USER_DESTINATION_PATH);
        $model->setAttribute('user_thumbnail', $filename);
        return $this->userRepositoryInterface->create($model);
    }

    /**
     * Update model
     *
     * @param BaseModel $model
     * @param array $data
     * @return mixed|void
     */
    public function update(BaseModel $model, array $data)
    {
        // TODO: Implement update() method.
    }

    /**
     * Delete model
     *
     * @param BaseModel $model
     * @return mixed|void
     */
    public function delete(BaseModel $model)
    {
        // TODO: Implement delete() method.
    }
}
