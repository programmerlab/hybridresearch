<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Settings;
use Modules\Admin\Http\Requests\GalleryRequest;
use Modules\Admin\Models\Gallery;
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
class GalleryController extends Controller {
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
        View::share('viewPage', 'Gallery');
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Gallery $gallery, Request $request) 
    { 
        
        $page_title = 'Gallery';
        $page_action = 'View Gallery'; 
        
        // Search by name ,email and group
        $search = Input::get('search'); 
        if ((isset($search) && !empty($search)) ) {

            $search = isset($search) ? Input::get('search') : '';
               
            $gallery = Gallery::where(function($query) use($search) {
                        if (!empty($search)) {
                            $query->Where('title', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $gallery = Gallery::orderBy('id','desc')->Paginate(10);
            
        } 
        return view('packages::gallery.index', compact('gallery', 'page_title', 'page_action'));
   
    }

    /*
     * create  method
     * */

    public function create(Gallery $gallery) 
    {
        $page_title = 'Gallery';
        $page_action = 'Create $gallery';

        return view('packages::gallery.create', compact('gallery','page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */

    public function store(GalleryRequest $request, Gallery $gallery) 
    {   
        if ($request->file('image')) {  

            $photo = $request->file('image');
            $destinationPath = storage_path('gallery/');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $banner_image1 = time().$photo->getClientOriginalName();
            $gallery->image   =   $banner_image1;
            
        } 

        $gallery->title     =   $request->get('title');
        $gallery->save();
       return Redirect::to(route('gallery'))
                            ->with('flash_alert_notice2', 'Page was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Gallery $gallery) {

        $page_title = 'Gallery';
        $page_action = 'Edit Gallery'; 
         
         return view('packages::gallery.edit', compact( 'gallery' ,'page_title', 'page_action'));
    }

    public function update(GalleryRequest $request, Gallery $gallery) 
    {
        
        if ($request->file('image')) {  

            $photo = $request->file('image');
            $destinationPath = storage_path('gallery/');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $banner_image1 = time().$photo->getClientOriginalName();
            $gallery->image   =   $banner_image1; 
        }  
        $gallery->title     =   $request->get('title');
        $gallery->save();  

        return Redirect::to(route('gallery'))
                        ->with('flash_alert_notice', 'Gallery Image was successfully updated!');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Gallery $gallery) 
    {
        Gallery::where('id',$gallery->id)->delete();
        return Redirect::to(route('gallery'))
                        ->with('flash_alert_notice', 'Gallery Image was successfully deleted!');
    }

    public function show(Gallery $gallery) {
        
    }

}
