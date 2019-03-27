<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Create an instance of user
     *
     * @return User
     */
    public function toUser(): User
    {
        return new User($this->all());
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|max:100|unique:users,username,',
            'password' => 'required|string|max:100',
            'name' => 'required|string|max:255',
        ];
    }
}
