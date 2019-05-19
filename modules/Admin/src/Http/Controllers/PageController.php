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
use Modules\Admin\Models\Pages;
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
class PageController extends Controller {
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
        View::share('viewPage', 'page');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Pages $page, Request $request) 
    { 
        
        $page_title = 'Page';
        $page_action = 'View Page'; 
        
        // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');
        if ((isset($search) && !empty($search)) OR  (isset($status) && !empty($status)) ) {

            $search = isset($search) ? Input::get('search') : '';
               
            $page = Pages::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('title', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $page = Pages::orderBy('id','desc')->Paginate(10);
            
        } 
        
        $js_file = ['common.js','bootbox.js','formValidate.js'];
        return view('packages::pages.index', compact('js_file','page', 'page_title', 'page_action'));
   
    }

    /*
     * create  method
     * */

    public function create(Pages $page) 
    {
        $page_title = 'page';
        $page_action = 'Create page';

        return view('packages::pages.create', compact('page','page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */

    public function store(PageRequest $request, Pages $page) 
    {   
        if ($request->file('images')) {  

            $photo = $request->file('images');
            $destinationPath = storage_path('files/banner_content/');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $banner_image1 = time().$photo->getClientOriginalName();
            $page->images   =   $banner_image1;
            
        } 

        $page->title     =   $request->get('title');
        $page->page_content   =   $request->get('page_content');
        $page->save();
       return Redirect::to(route('page'))
                            ->with('flash_alert_notice2', 'Page was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Pages $page) {

        $page_title = 'page';
        $page_action = 'Show page'; 
         
         return view('packages::pages.edit', compact( 'page','banner' ,'page_title', 'page_action'));
    }

    public function update(PageRequest $request, Pages $page) 
    {
        
        if ($request->file('images')) {  

            $photo = $request->file('images');
            $destinationPath = storage_path('files/banner_content/');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $banner_image1 = time().$photo->getClientOriginalName();
            $page->images   =   $banner_image1;
            
        } 

        $page->title     =   $request->get('title');
        $page->page_content   =   $request->get('page_content');
        $page->save();  

        return Redirect::to(route('page'))
                        ->with('flash_alert_notice', 'Page was successfully updated!');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Pages $page) 
    {
        Pages::where('id',$page->id)->delete();
        return Redirect::to(route('page'))
                        ->with('flash_alert_notice', 'Page was successfully deleted!');
    }

    public function show(Page $page) {
        
    }

}
