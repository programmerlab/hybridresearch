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
use Modules\Admin\Http\Requests\TrackSheetRequest;
use Modules\Admin\Models\TrackSheet;
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
class TrackSheetController extends Controller {
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
        View::share('viewPage', 'TrackSheet'); 
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(TrackSheet $trackSheet, Request $request) 
    { 
       
        // Search by name ,email and group
        $page_title  = "Track Sheet";
        $page_action = "View Track Sheet";
        $search = $request->get('search'); 
        if ($search) {

            $search = isset($search) ? Input::get('search') : '';
               
            $trackSheet = TrackSheet::where(function($query) use($search) {
                        if (!empty($search)) {
                            $query->Where('title', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $trackSheet = TrackSheet::orderBy('id','desc')->Paginate(10);
            
        } 
        
        $js_file = ['common.js','bootbox.js','formValidate.js'];
        return view('packages::trackSheet.index', compact('js_file','trackSheet', 'page_title', 'page_action'));
   
    }

    /*
     * create  method
     * */

    public function create(TrackSheet $trackSheet) 
    {
        $page_title = 'Track Sheet';
        $page_action = 'Create Track Sheet';
 
        return view('packages::trackSheet.create', compact('trackSheet','page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */

    public function store(TrackSheetRequest $request, TrackSheet $trackSheet) 
    {   
        if ($request->file('files')) {  
           
            $photo = $request->file('files');
            $destinationPath = storage_path('files/');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $file = time().$photo->getClientOriginalName();
            $trackSheet->files   =   $file;
            
        }  
        $trackSheet->title     =   $request->get('title');
        
        $trackSheet->save();
       return Redirect::to(route('trackSheet'))
                            ->with('flash_alert_notice', 'Track Sheet was successfully created !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(TrackSheet $trackSheet) {

        $page_title = 'Track Sheet';
        $page_action = 'Edit Track Sheet'; 
         
         return view('packages::trackSheet.edit', compact( 'trackSheet','banner' ,'page_title', 'page_action'));
    }

    public function update(Request $request, TrackSheet $trackSheet) 
    {
         if ($request->file('files')) {  
           
            $photo = $request->file('files');
            $destinationPath = storage_path('files/');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $file = time().$photo->getClientOriginalName();
            $trackSheet->files   =   $file;
            
        }  
        $trackSheet->title     =   $request->get('title');
        $trackSheet->save();
        return Redirect::to(route('trackSheet'))
                        ->with('flash_alert_notice', 'TrackSheet was successfully updated!');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(TrackSheet $trackSheet) 
    {
        TrackSheet::where('id',$trackSheet->id)->delete();
        return Redirect::to(route('trackSheet'))
                        ->with('flash_alert_notice', 'Page was successfully deleted!');
    }

    public function show(TrackSheet $trackSheet) {
        
    }

}
