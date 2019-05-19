<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Career extends Model {

   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'careers';
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
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','email','mobile','resume'];  // All field of user table here    
    
    
    
  
}
