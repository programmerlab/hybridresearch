<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent; 
use Modules\Admin\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class FreeTrial extends Eloquent { 

   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'free_trials';
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
     protected $fillable = ['first_name','last_name','email','phone','otherDetails','message']; // All field of user table here    



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     
  
}
