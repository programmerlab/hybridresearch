<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\ContactRequest;
use Modules\Admin\Models\User; 
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
use App\Helpers\Helper;
use Modules\Admin\Models\Contact; 
use Modules\Admin\Models\Kyc; 
use Response; 
use PDF;

/**
 * Class AdminController
 */
class KycController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct(Kyc $kyc) { 
        $this->middleware('admin');
        View::share('viewPage', 'Kyc');
        View::share('sub_page_title', 'Kyc');
        View::share('helper',new Helper);
        View::share('heading','Kyc');
        View::share('route_url',route('kyc')); 
        $this->record_per_page = Config::get('app.record_per_page'); 
    }



    public function riskProfile(Request $request)
    {

        $page_title = 'Risk Profile';
        $page_action  = 'View Risk Profile';

        $search = Input::get('search');
        if ((isset($search) && !empty($search))) {
             $riskProfile = \DB::table('risk_profiling')
                            ->OrWhere('full_name','LIKE',"%$search%")
                            ->OrWhere('risk_capacity','LIKE',"%$search%") 
                            ->orderBy('id','desc')
                            ->Paginate(15);
        }else{
            $riskProfile = \DB::table('risk_profiling')->orderBy('id','desc')->Paginate(15);
        }


        $export = $request->get('export');
        if($export=='pdf')
        {
           $riskProfile = \DB::table('risk_profiling')->where('id',$request->get('id'))->first(); 
           $data = $riskProfile;
           if(isset($riskProfile)){
                $score_point = json_decode($riskProfile->score_point);
                $riskProfile = json_decode($riskProfile->all_data);
           }



         //   dd( $riskProfile);
           $pdf = PDF::loadView('packages::kyc.riskpdf', compact('page_title', 'data','page_action','riskProfile','score_point'));
           return ($pdf->download(str_replace(" ", "_", $riskProfile->full_name).'_riskprofile.pdf'));
        }
        return view('packages::kyc.riskTolrance', compact('kyc','data', 'page_title', 'page_action','riskProfile'));
    }
   
    /*
     * Dashboard
     * */

    public function index(Kyc $kyc, Request $request) 
    { 
        $page_title = 'Kyc';
        $sub_page_title = 'View Kyc';
        $page_action = 'View Kyc';  


        // Search by name ,email and group
        $search = Input::get('search');
        $status = Input::get('status');
        if ((isset($search) && !empty($search))) {

            $search = isset($search) ? Input::get('search') : '';
               
            $kyc = Kyc::where(function($query) use($search,$status) {
                        if (!empty($search)) {
                            $query->Where('name', 'LIKE', "%$search%")
                                    ->OrWhere('email', 'LIKE', "%$search%")
                                      ->OrWhere('phone', 'LIKE', "%$search%");
                        }
                        
                    })->Paginate($this->record_per_page);
        } else {
            $kyc = Kyc::orderBy('id','desc')->Paginate($this->record_per_page);
        }

        $export = $request->get('export');
        if($export=='pdf')
        {
            $kyc = \DB::table('kyc')->where('id',$request->get('id'))->first();
           if(isset($kyc)){
                $kyc = json_decode($kyc->allData);
           }
                       
           $pdf = PDF::loadView('packages::kyc.pdf', compact('page_title', 'page_action','kyc'));
           return ($pdf->download('kyc.pdf'));
        }
         
        return view('packages::kyc.index', compact('kyc','data', 'page_title', 'page_action','sub_page_title'));
    }

    /*
     * create Group method
     * */

    public function create(Contact $contact) 
    {
        
        $page_title = 'Contact';
        $page_action = 'Create Contact';
        $category  = Category::all();
        $categories  = Category::all();
  
        return view('packages::contact.create', compact('categories', 'html','category','sub_category_name', 'page_title', 'page_action'));
    }


    public function riskProfileDel(Request $request,$id){
        \DB::table('risk_profiling')->where('id',$id)->delete(); 
        return Redirect::to('admin/riskProfile')->with('flash_alert_notice', 'Risk profile  successfully deleted.');
    }

    public function createGroup(Request $request)
    {
        $users = $request->get('ids');
        $validator = Validator::make($request->all(), [
                'groupName' => 'required|unique:contact_groups,groupName' 
            ]); 

        if ($validator->fails()) {
            $error_msg  =   [];
            foreach ( $validator->messages()->all() as $key => $value) {
                        array_push($error_msg, $value);     
                    }
                            
            return Response::json(array(
                'status' => 0,
                'message' => $error_msg[0],
                'data'  =>  ''
                )
            );
        }

        $cgObj             = new ContactGroup;
        $cgObj->groupName  = $request->get('groupName');
        $cgObj->parent_id  = 0;
        $cgObj->save();

        foreach ($users as $key => $value) {
            $contact        = Contact::find($value);
            $cg             = new ContactGroup;
            $cg->groupName  = $request->get('groupName');
            $cg->contactId  = $value;
            $cg->email      = $contact->email;
            $cg->name       = $contact->name;
            $cg->parent_id  = $cgObj->id;
            $cg->save();
        }

        return $cg;

        $contact = Contact::whereIn('id',$request->get('ids'))->get();
        return $contact;
    }

    /*
     * Save Group method
     * */

    public function store(ContactRequest $request, Contact $contact) 
    {   
        
        $categoryName = $request->get('categoryName');
        $cn= '';
        foreach ($categoryName as $key => $value) {
            $cn = ltrim($cn.','.$value,',');
        }
        
        $table_cname = \Schema::getColumnListing('contacts');
        $except = ['id','create_at','updated_at','categoryName'];
        $input = $request->all();
        $contact->categoryName = $cn;
        foreach ($table_cname as $key => $value) {
           
           if(in_array($value, $except )){
                continue;
           }

           if(isset($input[$value])) {
               $contact->$value = $request->get($value); 
           } 
        }
        $contact->save();   
         
        return Redirect::to(route('contact'))
                            ->with('flash_alert_notice', 'New contact successfully created!');
    }
    
    public function uploadFile($file)
    {
       
        //Display File Name
        $fileName = $file->getClientOriginalName();

        //Display File Extension
        $ext = $file->getClientOriginalExtension();
        //Display File Real Path
        $realPath = $file->getRealPath(); 
        //Display File Mime Type
        

        $file_name = time().'.'.$ext;
        $path = storage_path('csv');

        chmod($path ,0777);
        $file->move($path,$file_name);
        chmod($path.'/'.$file_name ,0777);
        return $path.'/'.$file_name;
    }

    public function contactImport(Request $request)
    {
        try{
            $file = $request->file('importContact');
            
            if($file==NULL){
                echo json_encode(['status'=>0,'message'=>'Please select  csv file!']); 
                exit(); 
            }
            $ext = $file->getClientOriginalExtension();
            if($file==NULL || $ext!='csv'){
                echo json_encode(['status'=>0,'message'=>'Please select valid csv file!']); 
                exit(); 
            }
            $mime = $file->getMimeType();   
           
            $upload = $this->uploadFile($file);
           
            $rs =    \Excel::load($upload, function($reader)use($request) {

            $data = $reader->all(); 
              
            $table_cname = \Schema::getColumnListing('contacts');
            
            $except = ['id','create_at','updated_at'];

            $input = $request->all();
           // $contact->categoryName = $cn;
            $contact =  new Contact;
            foreach ($data  as $key => $result) {
                foreach ($table_cname as $key => $value) {
                   if(in_array($value, $except )){
                        continue;
                   }
                   if(isset($result->$value)) {
                       $contact->$value = $result->$value; 
                       $status = 1;
                   } 
                }
                 if(isset($status)){
                     $contact->save(); 
                 }
            } 
           
            if(isset($status)){
                echo json_encode(['status'=>1,'message'=>'contact imported successfully!']);
            }else{
               echo json_encode(['status'=>0,'message'=>'Invalid file type or content.Please upload csv file only.']); 
            }
             
            });

        } catch (\Exception $e) {
            echo json_encode(['status'=>0,'message'=>'Please select csv file!']); 
            exit(); 
        }
        
       
    }

    /*
     * Edit Group method
     * @param 
     * object : $category
     * */

    public function edit(Contact $contact) {
        $page_title     = 'contact';
        $page_action    = 'Edit contact'; 
        $categories  = Category::all();
        $category_id  = explode(',',$contact->categoryName);
        
        return view('packages::contact.edit', compact('category_id','categories', 'url','contact', 'page_title', 'page_action'));
    }

    public function update(Request $request, Contact $contact) {
        
        $contact = Contact::find($contact->id); 
        $categoryName = $request->get('categoryName');
        $cn= '';
        foreach ($categoryName as $key => $value) {
            $cn = ltrim($cn.','.$value,',');
        }
    
        if($cn!=''){
            $contact->categoryName =  $cn;
        }
        $request = $request->except('_method','_token','categoryName');
        
        foreach ($request as $key => $value) {
            $contact->$key = $value;
        }
        $contact->save();
        return Redirect::to('admin/kyc')
                        ->with('flash_alert_notice', 'Contact  successfully updated.');
    }
    /*
     *Delete User
     * @param ID
     * 
     */
    public function destroy(Contact $contact) { 
        Kyc::where('id',$contact->id)->delete(); 

        return Redirect::to('admin/kyc')->with('flash_alert_notice', 'Kyc  successfully deleted.');
    }


    public function riskTolranceDel($id=null) { 
        \DB::table('risktolrance')->where('id', '=', $id)->delete();
        
        return Redirect::to('admin/riskTolrance')
                        ->with('flash_alert_notice', 'Risk Tolrance  successfully deleted.');
    }



    public function show($id) {
        
        return Redirect::to('admin/kyc');

            }

}