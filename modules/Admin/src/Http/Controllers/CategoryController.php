<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\CategoryRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Category;
//use App\Category;
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
use DB;
use Route;
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use App\Helpers\Helper;

/**
 * Class AdminController
 */
class CategoryController extends Controller {
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
        View::share('viewPage', 'service');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Category $category, Request $request) 
    { 
        $page_title = 'Service';
        $page_action = 'View Service'; 
        if ($request->ajax()) {
            $id = $request->get('id'); 
            $category = Category::find($id); 
            $category->status = $s;
            $category->save();
            echo $s;
            exit();
        }
        // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');
        if ((isset($search) && !empty($search))) {

            $search = isset($search) ? Input::get('search') : '';
               
            $categories = Category::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('category_name', 'LIKE', "%$search%")
                                    ->OrWhere('sub_category_name', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $categories = Category::orderBy('id','desc')->Paginate($this->record_per_page);
        }
        // Category sub category list-----
        
        
        return view('packages::category.index', compact('result_set','categories','data', 'page_title', 'page_action','html'));
    }

    /*
     * create Group method
     * */

    public function create(Category $category) 
    {
         
        $page_title = 'Service';
        $page_action = 'Create Service'; 

        return view('packages::category.create', compact('categories', 'html','category','sub_category_name', 'page_title', 'page_action'));
    }

    /*
     * Save Group method
     * */

    public function store(CategoryRequest $request, Category $category) 
    {   
        $cat = new Category;
        if ($request->file('image')) {  

            $photo = $request->file('image');
            $destinationPath = storage_path('services/'); 
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $banner_image = time().$photo->getClientOriginalName();
            $cat->category_image   =   $banner_image;
            
        }  
        
        $cat->title                  =  $request->get('title');  
        $cat->description            =  $request->get('description');  
        $cat->feature                 =   $request->get('feature');
        $cat->save();   

        return Redirect::to(route('service'))
                            ->with('flash_alert_notice', 'New Service was successfully created !');
        }

    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Category $category) {

        $page_title = 'Service';
        $page_action = 'Edit Service'; 
        return view('packages::category.edit', compact( 'category', 'page_title', 'page_action'));
    }

    public function update(Request $request, Category $category) { 

        $cat = Category::find($category->id);
        
        if ($request->file('image')) {  

            $photo = $request->file('image');
            $destinationPath = storage_path('services/'); 
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $banner_image = time().$photo->getClientOriginalName();
            $cat->category_image   =   $banner_image; 
        }  
        
        $cat->title                  =  $request->get('title');  
        $cat->description            =  $request->get('description');  
        $cat->feature                =   $request->get('feature');
        $cat->save();    

        return Redirect::to(route('service'))
                        ->with('flash_alert_notice', 'Service was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Category $category) {
        
        $d = Category::where('id',$category->id)->delete(); 
        return Redirect::to(route('category'))
                        ->with('flash_alert_notice', 'Service was successfully deleted!');
    }

    public function show(Category $category) {
        
    }

}
