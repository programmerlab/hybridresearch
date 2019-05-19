<?php

namespace Modules\Admin\Models; 
use Illuminate\Database\Eloquent\Model as Eloquent;
 
class BankAccount extends Eloquent {

   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bankAccounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bank_name','account_name','account_number','ifsc_code','bank_branch'];  // All field of user table here    

 
 
}
