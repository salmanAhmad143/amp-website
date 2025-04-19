<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:catalogs,name',
            'slug' => 'required|string|unique:catalogs,slug',
            'phone' => 'required|string|max:20',
            'category_id' => 'required',
            'tag_id' => 'required',
            'description' => 'nullable|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('catalog.form.validation.name.required'),
            'name.unique' => __('catalog.form.validation.name.unique'),
            'phone.required' => __('catalog.form.validation.phone.required'),
            'phone.max' => 'The phone number should not exceed 20 characters.',
            'slug.required' => __('catalog.form.validation.slug.required'),
            'slug.unique' => __('catalog.form.validation.slug.unique'),
            'images.*.required' => 'Each image is required.',
            'images.*.image' => 'Each file must be a valid image.',
            'images.*.mimes' => 'Only JPEG, PNG, JPG, and GIF formats are allowed.',
            'images.*.max' => 'Each image size must not exceed 2MB.',
        ];
    }
}
