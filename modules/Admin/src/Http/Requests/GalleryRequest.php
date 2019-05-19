<?php
namespace Modules\Admin\Http\Requests;
use App\Http\Requests\Request; 
 

class GalleryRequest  extends Request {

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
                            'title'             => 'required' ,  
                            'image'     => 'required|mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200', 
                        ];
                    }
                case 'PUT':
                case 'PATCH': {

                    if ( $page = $this->gallery ) {

                        return [
                            'title'             => 'required' ,  
                            'image'     => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200', 
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
