<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request; 
 

class ProductRequest  extends Request {

    /**
     * The product validation rules.
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
                            'title'     => "required|unique:services,title" ,  
                            'monthly_price'       => 'required|numeric|min:0',
                            'quarterly_price'             =>  'required|numeric|min:0',
                            'half_yearly_price'             =>  'required|numeric|min:0',
                            'yearly_price'             => 'required|numeric|min:0',
                              'photo'             => 'mimes:jpeg,bmp,png,gif',
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $product = $this->product ) {

                        return [
                             'title'     => "required" ,   
                            'monthly_price'       => 'required|numeric|min:0',
                            'quarterly_price'             =>  'required|numeric|min:0',
                            'half_yearly_price'             =>  'required|numeric|min:0',
                            'yearly_price'             => 'required|numeric|min:0',
                              'photo'             => 'mimes:jpeg,bmp,png,gif',
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
