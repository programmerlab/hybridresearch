<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
use Input;

class BankAccountRequest extends Request {

    /**
     * The metric validation rules.
     *
     * @return array
     */
    public function rules() {
        //if ( $metrics = $this->metrics ) {
            switch ( $this->method() ) {
                case 'GET':
                case 'DELETE': {
                        return [ ];
                    }
                case 'POST': {
                        return [
                            'bank_name'   => "required" ,  
                            'account_name' => 'required',
                            'account_number' => 'required', 
                            'ifsc_code' => 'required',
                            /*'confirm_password' => 'required|same:password'*/ 
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                    if ( $bankAccount = $this->bankAccount ) {

                        return [
                            'bank_name'   => "required" ,  
                            'account_name' => 'required',
                            'account_number' => 'required', 
                            'ifsc_code' => 'required',
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
