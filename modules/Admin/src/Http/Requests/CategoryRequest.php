<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
use Input;

class CategoryRequest  extends Request {

    /**
     * The metric validation rules.
     *
     * @return array    
     */
    public function rules() { 
            switch ( $this->method() ) {
                case 'GET':
                case 'DELETE': {
                        return [ ];
                    }
                case 'POST': {
                        return [
                            'title' => 'required|unique:categories,title',
                           'description' => 'required',
                             'image'             => 'required|mimes:jpeg,bmp,png,gif',
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $category = $this->category) {

                        return [
                            'title' => 'required|unique:categories,title',
                            'description' => 'required',
                            'image'             => 'required|mimes:jpeg,bmp,png,gif'
                        ];
                    }
                }
                default:break;
            }
        //}
    }

    /**
     * The
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

}
