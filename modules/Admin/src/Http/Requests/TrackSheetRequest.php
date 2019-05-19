<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request; 
 

class TrackSheetRequest  extends Request {

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
                            'title'    => 'required' ,  
                             'files'     => 'required|mimes:doc,docs,xlx,pdf,csv,xlsx', 
                        ];
                    }
                case 'PUT':
                case 'PATCH': {

                    if ( $tractSheet = $this->tractSheet ) {

                        return [
                            'title'             => 'required' ,  
                           'files'     => 'mimes:doc,docs,xlx,pdf,csv,xlsx', 
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
