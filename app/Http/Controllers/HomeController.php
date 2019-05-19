<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth,View,Html,URL,Validator,Paginate,Grids,Form,Hash,Lang;
use Session,DB,Route,Crypt,Redirect,Input; 
use App\Helpers\Helper as Helper;
use Modules\Admin\Models\Settings;
use Modules\Admin\Models\BankAccount;
use Modules\Admin\Models\Career;
use Modules\Admin\Models\Contact;
use Modules\Admin\Models\Faq;
use Modules\Admin\Models\FreeTrial;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Kyc;
use Modules\Admin\Models\Pages;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\Service as Pricing;
use Modules\Admin\Models\TrackSheet;
use Modules\Admin\Models\Transaction;
use Modules\Admin\Models\Blogs; 
//use Modules\Admin\Models\Pages; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     

    public function __construct(Request $request,Settings $setting) {  
        View::share('userData',$request->session()->get('current_user'));
        //$hot_products   = Product::orderBy('views','desc')->limit(3)->get();
        //$special_deals  = Product::orderBy('discount','desc')->limit(3)->get(); 
        //View::share('hot_products',$hot_products);
        //View::share('special_deals',$special_deals);  
        $website_title      = $setting::where('field_key','website_title')->first();
        $website_email      = $setting::where('field_key','website_email')->first();
        $website_url        = $setting::where('field_key','website_url')->first();
        $contact_number     = $setting::where('field_key','contact_number')->first();
        $company_address    = $setting::where('field_key','company_address')->first();
        $banner             = $setting::where('field_key','LIKE','%banner_image%')->get();

        $facebook_url        = $setting::where('field_key','facebook_url')->first();
        $linkedin_url        = $setting::where('field_key','linkedin_url')->first();
        $twitter_url        = $setting::where('field_key','twitter_url')->first();
      
        $pageMenu = Pages::all();
        
         foreach($pageMenu as $val){
             $url = url('page/'.str_slug($val->title));
         $html = "<li>".'<a href="'.$url.'">'.'<i class="fa fa-right">'.'</i>'.ucfirst($val->title).'</a></li>';
         
         }
        
        $trackSheet = TrackSheet::orderBy('id','desc')->Paginate(12);
       // dd($trackSheet);
        View::share('website_title',$website_title->field_value);
        View::share('website_email',$website_email->field_value);
        View::share('website_url',$website_url->field_value);
        View::share('contact_number',$contact_number->field_value); 
        View::share('company_address',$company_address->field_value); 

        View::share('facebook_url',$facebook_url);
        View::share('linkedin_url',$linkedin_url);
        View::share('twitter_url',$twitter_url);

        View::share('banner',$banner); 
        View::share('pageMenu',$pageMenu);
        View::share('trackSheet',$trackSheet);


        $blog4 = Blogs::orderBy('id','desc')->limit(3)->get();

          View::share('blog4',$blog4);
}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    { 
        $title = "About Us";
        $tagLine = "Intraday Stock Trading Tips by Research Infotech";

        $meta1 = '<meta name="description" content=" Research Infotech Provides Intraday Tips,Share Market Trading Tips,Intraday Stock Tips,Day Trading Tips, Mcx Commodity Trading Tips,Stock & Nifty future tips on Intraday Basis. "/>';
        $meta2 = '<meta name="keywords" content=" Intraday tips,intraday stock tips,free intraday tips on mobile, stock trading tips,stock tips,stock market tips for intraday, commodity tips, stock tips India,stock future tips,nifty future tips,option tips, indian intraday trading tips Stock Intraday Tips for Today,Free Intraday Tips on Mobile"/>';


        return view('investmentvia.about',compact('title','tagLine','meta1','meta2'));
    }  

    public function home(Request $request)
    {
        $title = "Home";
        $tagLine = "Research Infotech- Best Stock Market Tips Provider ";
        $request->session()->forget('amount');

        $meta1 = '<meta name="description" content=" Research Infotech is one of the leading Stock Advisory Company which Provides Stock Tips,Mcx Tips,Commodity Trading Tips,Indian Share Market Tips,Equity Tips,Intraday Tips,Nifty Future Tips, Free Intraday Stock Tips on Mobile. "/>';
        $meta2 ='<meta name="keywords" content="Stock Market Tips, Intraday Tips Provider, Best SEBI Registered Advisory"/>';

        return view('investmentvia.home',compact('title','tagLine','meta1','meta2'));
    }

    
    public function services()
    {
        $title = "Services";
        $tagLine = "Indian Stock Market, Commodity Market Tips Provider Company";
        $service = Category::all();
        $url = url('public/assets/js/jquery-2.2.3.js');
        $jsUrl = '<script src="'.$url.'"></script>';

        $meta1 = '<meta name="description" content=" Research Infotech Provide the Stock & Commodity Market Tips, Indian Stock Market Tips,Mcx Tips,Equity Trading Tips,Future & Option Tips,Bullion Tips & Premium Services at best among the market. "/>';
        $meta2 = '<meta name="keywords" content="share tips, stock cash tips, Indian share market tips, share market tips, Intraday Trading Tips, Share Market Recommendations, Today Stock Cash Tips, commodities trading tips, Nifty charts, Premium Services & Tips"/>';
          
        return view('investmentvia.service',compact('service','jsUrl','title','tagLine','meta1','meta2'));
    }

    public function payment(Request $request)
    {
        $bankAccount = BankAccount::all();
        $title = "Payment";
        $tagLine = "We offer the most complete advisory services in the country";
        $request->session()->forget('amount');
        return view('investmentvia.payment', compact('bankAccount','title','tagLine'));
    }
 

    public function pricing(Request $request)
    {
        $pricing = Product::all(); 
        $title = "Pricing";
        $tagLine = "We offer the most complete advisory services in the country";
        $request->session()->forget('amount');

        return view('investmentvia.pricing',compact('pricing','title','tagLine'));
    }

    public function package()
    {
        $title = "Package";
        $tagLine = "We offer the most complete advisory services in the country";
        return view('investmentvia.package',compact('title','tagLine'));
    }
 
    public function privacypolicy()
    {
        $title = "Privacy Policy";
        $tagLine = "We offer the most complete advisory services in the country";
        return view('investmentvia.privacypolicy',compact('title','tagLine'));
    } 
     /*----------*/
    public function faq()
    {
         $faq = Faq::all();
        $title = "FAQ";
        $tagLine = "We offer the most complete advisory services in the country";
        return view('investmentvia.faq',compact('title','tagLine','faq')); 
    }

    public function contact(Request $request, Contact $contact)
    {   
        $url = rtrim(url()->previous(),'/');
        $title = "Contact";
        $tagLine = "Free Intraday Equity and Commodity Tips by Research Infotech";
        if($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'mobile' => 'required|numeric|min:10',
                'comments' => 'required'
            ]); 

            if ($validator->fails()) {
                 return Redirect::to('contact')
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $input = $request->only('name','email','mobile','comments');
                \DB::table('contacts')->insert($input);
                if($url==url()->to('/')){
                    return Redirect::to('status/success')  ;
                }
                return Redirect::to('contact')->withErrors(['successMsg'=>'Thanking for Contacting us!']);
                
            }
        }
           
        return view('investmentvia.contact',compact('title','tagLine','contact'));   
    } 
    public function tNc()
    {
        $title = "Terms & Condition";
        $tagLine = "We offer the most complete advisory services in the country";
        return view('investmentvia.tNc',compact('title','tagLine'));
    }

    public function career(Request $request, Career $career)
    {
        $title = "Career";
        $tagLine = "We offer the most complete advisory services in the country";
         
        if($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'mobile' => 'required|numeric|min:10',
                'designation' => 'required',
                'file' => 'required|mimes:doc,pdf,docs'
            ]); 

            if ($validator->fails()) {
                 return Redirect::to('career')
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $input = $request->only('name','email','mobile','designation');
                if ($request->file('file')) {  
                    $photo = $request->file('file');
                    $destinationPath = storage_path('resume/');
                    $photo->move($destinationPath, time().$photo->getClientOriginalName());
                    $file = time().$photo->getClientOriginalName();
                    $input['resume']   =   $file; 
                }  
                $input['first_name'] = $request->get('name');  
                \DB::table('careers')->insert($input);
                return Redirect::to('career')->withErrors(['successMsg'=>'Thanking for Contacting us!']);
            }
        }
        
        return view('investmentvia.career',compact('title','tagLine','career'));
    }

    public function blog(Blogs $blog,$id=null, $name=null)
    {
        $title = "Reports";
        $tagLine = "We offer the most complete advisory services in the country";
        $blogs = Blogs::orderBy('id','desc')->get();
        $url = url('public/assets/js/jquery-2.2.3.js');
        $jsUrl = '<script src="'.$url.'"></script>';
        
        $blogDetails = Blogs::where('id',$id)->first();
        if($blogDetails){
            return view('investmentvia.blogDetail',compact('blogDetails','jsUrl','title','tagLine')); 
        }

        return view('investmentvia.blog',compact('blogs','jsUrl','title','tagLine'));
    
    } 
    public function riskTolrance()
    {
        $title = "Risk Tolrance";
        $tagLine = "We offer the most complete advisory services in the country";
        return view('investmentvia.riskTolrance',compact('title','tagLine'));
    }
    
    public function riskProfiling()
    {
        $title = "Risk Profiling";
        $tagLine = "Research Infotech Investment Advisory";

        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/Research-Infotech.xlsx";

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return \Response::download($file, 'Research-Infotech-risktolrance.xlsx');


        return view('investmentvia.riskProfiling',compact('title','tagLine'));
    }

    
    public function kyc(Request $request, Kyc $kyc)
    {
        $title = "Kyc";
        $tagLine = "We offer the most complete advisory services in the country";
        return view('investmentvia.kyc',compact('title','tagLine','kyc'));
    }

    public function discloser()
    {
        $title = "Discloser";
        $tagLine = "We offer the most complete advisory services in the country";
        return view('investmentvia.discloser',compact('title','tagLine'));
    }
    
    public function freeTrial(Request $request)
    {
       
        $input['name'] = $request->get('name');
        $input['phone'] = $request->get('phone');
        
        $input = $request->only('name','email','phone','city','service_name');
        \DB::table('free_trials')->insert($input);
        
        return Redirect::to('status/success');

    }
    
    public function page(Request $request, $name=null)
    {
        $title = ucfirst(str_replace('-'," ",$name));
        $tagLine = "We offer the most complete advisory services in the country";
        $name = str_replace('-'," ",$name);
        
        $page = Pages::where('title','LIKE',"%$name%")->first();
        
        return view('investmentvia.page',compact('title','tagLine','page'));   
                
    }
    public function kycForm(Request $request, Kyc $kyc)
    {
        $title = "Kyc";
        $tagLine = "We offer the most complete advisory services in the country";
         
        if($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'city' => 'required',
                'adhar_number' => 'required|numeric|min:12',
                'pan' => 'required',
             //   'file' => 'required|mimes:doc,pdf,docs'
            ]); 
                if ($validator->fails()) {
                     return Redirect::to('kyc')
                            ->withErrors($validator)
                            ->withInput();
                }else{
               
                    if ($request->file('file')) {  
                        $photo = $request->file('file');
                        $destinationPath = storage_path('kyc/');
                        $photo->move($destinationPath, time().$photo->getClientOriginalName());
                        $file = time().$photo->getClientOriginalName();
                    } 
                        $allData    =   $request->except('_token','file');
                        $phone      =   $request->get('home_telephone');
                        $input      =   $request->only('name','email','pan','adhar_number');
                        $input['phone']  = $phone;

                        if(isset($file)){
                            $input['doc'] = $file;
                        }
                        $input['allData']  = json_encode($allData);   

                    \DB::table('kyc')->insert($input);
                    return Redirect::to('kyc')->withErrors(['successMsg'=>'Thanking for Contacting us!']);
                    }
        }
       return view('investmentvia.kyc',compact('title','tagLine','kyc'));
    }

    public function riskProfilingForm(Request $request, Kyc $kyc)
    {
        $title       = "Research Infotech Investment Advisory";
        $tagLine     = "We offer the most complete advisory services in the country";

        if($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'services' =>  'required'
            ]); 
                if ($validator->fails()) {
                     return Redirect::to('risk-profiling')
                            ->withErrors($validator)
                            ->withInput();
                }else{

                    $except = ['id', 'create_at', 'updated_at']; 
                    $table_cname = \Schema::getColumnListing('risk_profiling');
                    foreach ($table_cname as $key => $value) {
                    if (in_array($value, $except)) {
                        continue;
                    }
                    if ($request->input($value) != null) {
                            $input[$value] = $request->get($value);
                        }
                    }     
                    $allData            =   $request->except('_token','score_point','score');
                    $input['all_data']  =   json_encode($allData);  

                    \DB::table('risk_profiling')->insert($input);
                    return Redirect::to('status/success')->withErrors(['successMsg'=>'Thanking you!']);
                }
        }
       return view('investmentvia.risk-profiling',compact('title','tagLine','kyc'));
    }

    public function riskTolranceForm(Request $request, Kyc $kyc)
    {
        $title       = "Risk Tolrance";
        $tagLine     = "We offer the most complete advisory services in the country";

        if($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'email' =>  'required|email'
            ]); 
                if ($validator->fails()) {
                     return Redirect::to('risk-tolrance')
                            ->withErrors($validator)
                            ->withInput();
                }else{

                    $except = ['id', 'create_at', 'updated_at']; 
                    $table_cname = \Schema::getColumnListing('risktolrance');
                    foreach ($table_cname as $key => $value) {
                    if (in_array($value, $except)) {
                        continue;
                    }
                    if ($request->input($value) != null) {
                            $input[$value] = $request->get($value);
                        }
                    }     
                        $allData    =   $request->except('_token');
                        $input['allData']  = json_encode($allData);   


                    \DB::table('risktolrance')->insert($input);
                    return Redirect::to('status/success')->withErrors(['successMsg'=>'Thanking for Contacting us!']);
                    }
        }
       return view('investmentvia.risk-tolrance',compact('title','tagLine','kyc'));
    }

    public function freeTrialForm(Request $request, FreeTrial $freeTrial)
    {
        $title = "Free Trial";
        $tagLine = "Free Intraday Equity and Commodity Tips by Research Infotech";

        if($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|max:50',
                'email' => 'email',
                'city' => 'required|max:20',
                'phone' => 'required|numeric'
            ]); 
                if ($validator->fails()) {
                     return Redirect::to('free-trial')
                            ->withErrors($validator)
                            ->withInput();
                }else{
               
                   $input = $request->only('name','email','phone','city','service_name');
                   
                    \DB::table('free_trials')->insert($input);
                    return Redirect::to('free-trial')->withErrors(['successMsg'=>'Thanking for Contacting us!']);
                    }
        }
        $meta1 = '<meta name="description" content=" We are providing Free Trials on Equity and Commodity Market best accuracy level. We are also providing Free Stock Tips,Mcx Tips,Commodity Market Tips,Intraday Trading Tips, Share Market Tips,Nifty Future & Option Tips, Free Equity Tips on Mobile. "/>';
        $meta2  = '<meta name="keywords" content="free Stock Cash Tips,commodity tips,mcx tips,ncdex tips,share market tips,intraday tips,Stock Cash Tips,stock market tips,indian share market tips,nse tips,bse tips,intraday trading,free intraday tips,intraday calls,financial advisory,indian stock market,indore"/>';

        return view('investmentvia.freeTrialForm',compact('title','tagLine','freeTrial','meta1','meta2'));
        
    }
    public function lifeAtResearchInfotech(Request $request)
    {
        $title = "life @Research Infotech";
        $tagLine = "We offer the most complete advisory services in the country";
        $gallery = \DB::table('gallery')->get();
      // dd(file_exists(storage_path('gallery/gallery6.jpg')));
        return view('investmentvia.lifeAtResearchInfotech',compact('title','tagLine','gallery'));
        
        
    }

    public function paymentResponse(Request $request, $status=null)
    {
        $title      = "Status Message";
        $tagLine    = "We offer the most complete advisory services in the country";
        \Log::useDailyFiles(storage_path().'/logs/payment.log');
        $data['response'] = isset($_POST['encResp'])?$_POST['encResp']:[];
        \Log::info(json_encode($data));
        $params= [];
        $response=[];    
        if($request->method()=="POST")
        {  
            
            $secret_key = "6ff23b218d1f7b55264820d1a5a33681";   // Pass Your Registered Secret Key from EBS secure Portal
            if(isset($_REQUEST)){
                 $response = $_REQUEST;
                 $sh = $response['SecureHash']; 
                 $params = $secret_key;
                 ksort($response);
                        foreach ($response as $key => $value){
                            if (strlen($value) > 0 and $key!='SecureHash') {
                                    $params .= '|'.$value;
                                }
                            }
                $msg    = "Payment successfully done.";
       
            }
               
             
        }else{
            $msg    =   "Payment failed!.Please try again.";  
            
        } 
 
        return view('investmentvia.paymentStatus',compact('title','tagLine','msg','response'));
    }

    public function paymentStatus(Request $request, $status=null)
    {
        $title      = "Status Message";
        $tagLine    = "We offer the most complete advisory services in the country";
        $msg        = "Oops..!Something went Wrong. Please try again.";
        \Log::useDailyFiles(storage_path().'/logs/payment.log');
        $data['response'] = isset($_POST['encResp'])?$_POST['encResp']:[];
        \Log::info(json_encode($data));
        $params= [];
        
        if($request->method()=="POST")
        {  
            $encryptedText =  isset($_POST['encResp'])?$_POST['encResp']:[];
            if(count($encryptedText)>0){
                $key = "73F096AFBA1C6B5F16864C9D3D434979";
                $queryString = $this->decrypt($encryptedText,$key);
                $query  = explode('&', $queryString);
                $params = array();
                foreach($query as $param)
                {
                    list($name, $value) = explode('=', $param);
                    $params[urldecode($name)] = urldecode($value);
                }
                 \Log::info(json_encode(['payment_status'=>$params])); 
                if(isset($params) &&  $params['order_status']=="Success")
                {
                    $msg = "Payment Completed successfully";
                }elseif(isset($params) &&  $params['order_status']=="Aborted")
                {
                    $msg = "Payment Aborted by customer";
                }else{
                    $params['payment_status'] = "Payment Cancelled";
                    $msg = "Payment ".isset($params['status_message'])?$params['status_message']:"Payment is pending";
                }
            }else{
                 $msg    = "Failed!. Payment cancel by payment gateway.";
             }   
             
        }else{
            if($status=='failed'){
                $msg    =   "Payment failed!.Please try again.";  
            }else{
                $msg    =   "Thank you!.Your request submitted successfully.";  
            }
        } 
 
        return view('investmentvia.paymentStatus',compact('title','tagLine','msg','params'));
    }
    // CCAvenue Integration

    public function paymentConfirm(Request $request){
        $payment = null; 
        $title = "Checkout<br><br>";
        $tagLine = "We offer the most complete advisory services in the country";

        ini_set('display_errors',1);
            error_reporting(E_ALL);

            $hashData = "6ff23b218d1f7b55264820d1a5a33681"; //Pass your Registered Secret Key

            unset($_POST['submitted']);
            unset($_POST['_token']);
            
            ksort($_POST);
            foreach ($_POST as $key => $value){
                if (strlen($value) > 0) {
                    $hashData .= '|'.$value;
                }
            }
            
            if (strlen($hashData) > 0) {
                $secure_hash = strtoupper(hash("sha512",$hashData));//for SHA512
                 
            } 
         $btn =    '<form action="https://secure.ebs.in/pg/ma/payment/request" name="payment" method="POST">
                    <input type="hidden" value="'.$_POST['account_id'].'" name="account_id"/>
                    <input type="hidden" value="'.$_POST['address'].'" name="address"/> 
                    <input type="hidden" value="'.$_POST['amount'].'" name="amount"/> 
                    <input type="hidden" value="'.$_POST['bank_code'].'" name="bank_code"/> 
                    <input type="hidden" value="'.$_POST['card_brand'].'" name="card_brand"/> 
                    <input type="hidden" value="'.$_POST['channel'].'" name="channel"/> 
                    <input type="hidden" value="'.$_POST['city'].'" name="city"/> 
                    <input type="hidden" value="'.$_POST['country'].'" name="country"/> 
                    <input type="hidden" value="'.$_POST['currency'].'" name="currency"/> 
                    <input type="hidden" value="'.$_POST['description'].'" name="description"/> 
                    <input type="hidden" value="'.$_POST['display_currency'].'" name="display_currency"/> 
                    <input type="hidden" value="'.$_POST['display_currency_rates'].'" name="display_currency_rates"/> 
                    <input type="hidden" value="'.$_POST['email'].'" name="email"/> 
                    <input type="hidden" value="'.$_POST['emi'].'" name="emi"/>
                    <input type="hidden" value="'.$_POST['mode'].'" name="mode"/> 
                    <input type="hidden" value="'.$_POST['name'].'" name="name"/> 
                    <input type="hidden" value="'.$_POST['page_id'].'" name="page_id"/> 
                    <input type="hidden" value="'.$_POST['payment_mode'].'" name="payment_mode"/> 
                    <input type="hidden" value="'.$_POST['payment_option'].'" name="payment_option"/> 
                    <input type="hidden" value="'.$_POST['phone'].'" name="phone"/> 
                    <input type="hidden" value="'.$_POST['postal_code'].'" name="postal_code"/> 
                    <input type="hidden" value="'.$_POST['reference_no'].'" name="reference_no"/> 
                    <input type="hidden" value="'.$_POST['return_url'].'" name="return_url"/> 
                    <input type="hidden" value="'.$_POST['ship_address'].'" name="ship_address"/> 
                    <input type="hidden" value="'.$_POST['ship_city'].'" name="ship_city"/> 
                    <input type="hidden" value="'.$_POST['ship_country'].'" name="ship_country"/> 
                    <input type="hidden" value="'.$_POST['ship_name'].'" name="ship_name"/> 
                    <input type="hidden" value="'.$_POST['ship_phone'].'" name="ship_phone"/> 
                    <input type="hidden" value="'.$_POST['ship_postal_code'].'" name="ship_postal_code"/> 
                    <input type="hidden" value="'.$_POST['ship_state'].'" name="ship_state"/> 
                    <input type="hidden" value="'.$_POST['state'].'" name="state"/> 
                    <input type="hidden" value="'.$secure_hash.'" name="secure_hash"/>
                    <button onclick="document.payment.submit();" class="btn btn-primary"> Click Here to continue  </button>

                    </form>Net Payment : '.$_POST['amount'];

        return view('investmentvia.confirmPayment',compact('title','tagLine','btn')); 

    }

    public function checkOutEbs(Request $request, $serviceName=null){
        
        $payment = null; 
        $title = "Checkout<br><br>";
        $tagLine = "We offer the most complete advisory services in the country";
        
        $order_id = strtoupper(str_random(10));

        $merchant_data='';
        $merchant_id = "36234";
        $working_key='73F096AFBA1C6B5F16864C9D3D434979';//Shared by CCAVENUES
        $access_code='AVMV75FA53AY58VMYA';//Shared by CCAVENUES
        $url = url('public/assets/js/jquery-2.2.3.js');
        $url2 = url('assets/js/json.js');
        
        $jsUrl1 = '<script src="'.$url.'"></script>';
        $jsUrl2  = '<script src="'.$url2.'"></script>';

        $accountId = '27682';
        
        $defaultAmount =  $request->get('amount');    
        $amount = ($request->get('amount'))?$request->get('amount'):"1";


        return view('investmentvia.ebs',compact('defaultAmount','title','tagLine','jsUrl1','jsUrl2','serviceName','amount','payment','merchant_id','order_id','accountId'));
    }

    public function checkout(Request $request, $serviceName=null)
    {
        $payment = null; 
        $title = "Checkout<br><br>";
        $tagLine = "We offer the most complete advisory services in the country";
        
        $order_id = strtoupper(str_random(10));

       

        
    	$merchant_data='';
        $merchant_id = "36234";
    	$working_key='73F096AFBA1C6B5F16864C9D3D434979';//Shared by CCAVENUES
    	$access_code='AVMV75FA53AY58VMYA';//Shared by CCAVENUES
    	$url = url('public/assets/js/jquery-2.2.3.js');
            $url2 = url('assets/js/json.js');
            
            $jsUrl1 = '<script src="'.$url.'"></script>';
            $jsUrl2  = '<script src="'.$url2.'"></script>';
        
        $defaultAmount =  $request->get('amount');    
    	$amount = ($request->get('amount'))?$request->get('amount'):"1";


        if($serviceName){
            $serviceName = ucfirst(str_replace('-', " ", $serviceName));
        }
        
        if($request->method()==='POST')
        {
            
            $validator = Validator::make($request->all(), [
                'total_amount' => 'required|numeric',
            ]); 
            if ($validator->fails()) {
                 return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
            }
            $working_key= env('WORKING_KEY','73F096AFBA1C6B5F16864C9D3D434979') ;//Shared by CCAVENUES
            $access_code=env('ACCESS_CODE','AVMV75FA53AY58VMYA');//Shared by CCAVENUES
            $merchant_data='';
            $requests = $request->except('_token','total_amount');
            if(session('amount')){
                $amount = session('amount');
            }else{
                $amount = $request->get('amount');
            }
            $amount = number_format((float)$amount, 2, '.', '');
            foreach ($requests as $key => $value){
                if($key=="amount")
                {
                    $value = number_format((float)$value, 2, '.', '');
                    $merchant_data.=$key.'='.$value.'&';   
                }else{
                    $merchant_data.=$key.'='.$value.'&';
                }
            }
        $encrypted_data=$this->encrypt($merchant_data,$working_key); // Method for encrypting the data.

       // dd($encrypted_data,$working_key);

        $production_url='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
          return Redirect::to($production_url);
        }
        if ($request->session()->has('amount')) {
            $amount = session('amount');
        }else{
            $request->session()->put('amount', $amount);
        }
        return view('investmentvia.paypal',compact('defaultAmount','title','tagLine','jsUrl1','jsUrl2','serviceName','amount','payment','merchant_id','order_id'));
    }
    public function encrypt($plainText,$key)
    {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
        $blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
        $plainPad = $this->pkcs5_pad($plainText, $blockSize);
        if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1) 
        {
              $encryptedText = mcrypt_generic($openMode, $plainPad);
              mcrypt_generic_deinit($openMode);

        } 
        return bin2hex($encryptedText);
    }

    public function decrypt($encryptedText,$key)
    {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText=$this->hextobin($encryptedText);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
        mcrypt_generic_init($openMode, $secretKey, $initVector);
        $decryptedText = mdecrypt_generic($openMode, $encryptedText);
        $decryptedText = rtrim($decryptedText, "\0");
        mcrypt_generic_deinit($openMode);
        return $decryptedText;

    }
	//*********** Padding Function *********************

    public function pkcs5_pad ($plainText, $blockSize)
    {
        $pad = $blockSize - (strlen($plainText) % $blockSize);
        return $plainText . str_repeat(chr($pad), $pad);
    }

	//********** Hexadecimal to Binary function for php 4.0 version ********

    public function hextobin($hexString) { 
        $length = strlen($hexString); 
        $binString="";   
        $count=0; 
        while($count<$length) 
        {       
            $subString =substr($hexString,$count,2);           
            $packedString = pack("H*",$subString); 
            if ($count==0)
            {
                        $binString=$packedString;
            } 

            else 
            {
                        $binString.=$packedString;
            } 

            $count+=2; 
        } 
        return $binString; 
      } 
}
