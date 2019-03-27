<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Create an instance of blog
     *
     * @return Blog
     */
    public function toBlog(): Blog
    {
        return new Blog($this->all());
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
        if ($this->input('action_type') == 'create') {
            return [
                'title' => 'required|string|unique:blogs,title',
                'content' => 'required|string',
            ];
        }
        $id = $this->input('id');
        return [
            'title' => 'required|string|unique:blogs,title,' . $id,
            'content' => 'required|string',
        ];
    }
}
