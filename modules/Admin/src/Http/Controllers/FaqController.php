<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\Settings;
use Modules\Admin\Http\Requests\SettingRequest;
use Modules\Admin\Http\Requests\PageRequest;
use Modules\Admin\Http\Requests\FaqRequest;
use Modules\Admin\Models\Pages;
use Modules\Admin\Models\Faq;
use Input;
use Validator;
use Auth;
use Paginate;
use Grids;
use HTML;
use Form;
use Hash;
use View;
use URL;
use Lang;
use Session;
use Route;
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use Modules\Admin\Helpers\Helper as Helper;
use Response;

/**
 * Class AdminController
 */
class FaqController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {

        $this->middleware('admin');
        View::share('viewPage', 'Faq');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Faq $faq, Request $request) 
    { 
        
        $page_title = 'Faq';
        $page_action = 'View Faq'; 
        
        // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');
        if ((isset($search) && !empty($search)) OR  (isset($status) && !empty($status)) ) {

            $search = isset($search) ? Input::get('search') : '';
               
            $faq = Faq::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('question', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $faq = Faq::orderBy('id','desc')->Paginate(10);
            
        } 
        
        $js_file = ['common.js','bootbox.js','formValidate.js'];
        return view('packages::faq.index', compact('js_file','faq', 'page_title', 'page_action'));
   
    }

    /*
     * create  method
     * */

    public function create(Faq $faq) 
    {
        $page_title = 'Faq';
        $page_action = 'Create Faq';

        return view('packages::faq.create', compact('faq','page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */

    public function store(FaqRequest $request, Faq $page) 
    {    
        $page->fill(Input::all());
        $page->save();
       return Redirect::to('admin/faq')
                            ->with('flash_alert_notice2', 'Faq was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Faq $faq) {

        $page_title = 'Faq';
        $page_action = 'Edit Faq'; 
         
         return view('packages::faq.edit', compact( 'faq' ,'page_title', 'page_action'));
    }

    public function update(FaqRequest $request, Faq $page) 
    { 
        $page->fill(Input::all());
        $page->save(); 

        return Redirect::to('admin/faq')
                        ->with('flash_alert_notice', 'Faq was successfully updated!');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Faq $page) 
    {
        Faq::where('id',$page->id)->delete();
        return Redirect::to('admin/faq')
                        ->with('flash_alert_notice', 'Faq was successfully deleted!');
    }

    public function show(Page $page) {
        
    }

}
