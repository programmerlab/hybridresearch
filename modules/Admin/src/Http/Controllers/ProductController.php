<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Product as Product;
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
class ProductController extends Controller {
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
        View::share('viewPage', 'product');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Product $product, Request $request) 
    { 
       
       $page_title = 'Pricing';
        $page_action = 'View Pricing'; 
       // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');
        if ((isset($search) && !empty($search)) OR  (isset($status) && !empty($status)) ) {

            $search = isset($search) ? Input::get('search') : '';
               
            $products = Product::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('title', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $products = Product::orderBy('id','desc')->Paginate(10);
            
        } 
         
        return view('packages::pricing.index', compact('products', 'page_title', 'page_action','helper'));
   
    }

    /*
     * create  method
     * */

    public function create(Product $product) 
    {
        $page_title = 'Pricing';
        $page_action = 'Create Pricing';
        $sub_category_name  = Product::all();
        
        return view('packages::pricing.create', compact('product', 'page_title', 'page_action'));
     }

    /*
     * Save Group method
     * */

    public function store(ProductRequest $request, Product $product) 
    {
        $product->fill(Input::except('photo'));  
        if ($request->file('photo')) { 
            $photo = $request->file('photo');
            $destinationPath = storage_path('pricing');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $photo_name = time().$photo->getClientOriginalName();
           $product->photo = $photo_name; 
        }  
        $product->payment_url = $request->get('payment_url');
        $product->save(); 
        return Redirect::to(route('product'))
                            ->with('flash_alert_notice', 'New Pricing was successfully added !');
    }
    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Product $product) {

        $page_title = 'Pricing';
        $page_action = 'Edit Pricing';  

        return view('packages::pricing.edit', compact('product', 'page_title', 'page_action'));
    }

    public function update(ProductRequest $request, Product $product) 
    {
         $product->fill(Input::except('photo')); 
        if ($request->file('photo')) { 
            $photo = $request->file('photo');
            $destinationPath = storage_path('pricing/');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $photo_name = time().$photo->getClientOriginalName(); 
           $product->photo = $photo_name;
        } 
        $product->payment_url = $request->get('payment_url');
        $product->save();
        
        return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Pricing was  successfully updated !');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Product $product) {
        
        Product::where('id',$product->id)->delete();

        return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Product was successfully deleted!');
    }

    public function show(Product $product) {
        
    }

}
