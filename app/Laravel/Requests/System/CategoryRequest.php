<?php

namespace App\Laravel\Requests\System;

use App\Laravel\Requests\RequestManager;
// use JWTAuth;

class CategoryRequest extends RequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('id')?:0;
        
        $rules = [
            'name' => "required|unique:category,name,{$id}",       
        ];

      

        return $rules;
    }

    public function messages() {

        return [
            'required'  => "Field is required.",
            'file.max'  => "Image should not be exceeding to 5mb.",
            'category_id.valid_category'   => "Invalid category.",
        ];
    }
}
