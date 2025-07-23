<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'image_link' => 'nullable|url',
            'categories' => 'array',
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        $data['title'] = strip_tags($data['title'] ?? '');
        $data['content'] = strip_tags($data['content'] ?? '');
        $data['author'] = strip_tags($data['author'] ?? '');
        $data['author'] = strip_tags($data['author'] ?? '');
        $data['image_link'] = strip_tags($data['image_link'] ?? '');

        return $data;
    }
}
