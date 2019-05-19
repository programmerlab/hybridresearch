<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, auth-token');
header('Access-Control-Allow-Credentials: true');

if (env('APP_ENV') === 'prod') {
    URL::forceSchema('https');
}



Route::get('donwloadFreeTrial',function(){

        $data = \DB::table('free_trials')->select('name','email','phone','city')->get();

        if($data){

           $jsonData = json_encode($data);
           $data = json_decode($jsonData,true);
        }else{
          $data['data'] = "record not found";
        }

        return Excel::create('freeTrial', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('csv');
});

Route::get('donwloadContact',function(){

        $data = \DB::table('contacts')->select('name','email','mobile','comments')->get();

        if($data){

           $jsonData = json_encode($data);
           $data = json_decode($jsonData,true);
        }else{
          $data['data'] = "record not found";
        }

        return Excel::create('contacts', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('csv');
});

Route::get('/',function(){
	return  \Redirect::to('home');
});

Route::get('/',[
          'as' => 'home',
          'uses'  => 'HomeController@home'
        ]);

Route::get('home',[
          'as' => 'home',
          'uses'  => 'HomeController@home'
        ]);

Route::get('about',[
          'as' => 'about',
          'uses'  => 'HomeController@about'
        ]);


Route::get('services',[
          'as' => 'services',
          'uses'  => 'HomeController@services'
        ]);


Route::get('payment',[
          'as' => 'payment',
          'uses'  => 'HomeController@payment'
        ]);


Route::get('pricing',[
          'as' => 'pricing',
          'uses'  => 'HomeController@pricing'
        ]);


Route::get('package',[
          'as' => 'package',
          'uses'  => 'HomeController@package'
        ]);

 
 Route::match(['post','get'],'contact',[
                'as' => 'contactForm',
                'uses' => 'HomeController@contact'
                ]
            );  
 
  Route::match(['post','get'],'page/{string}',[
                'as' => 'privacy-policy',
                'uses' => 'HomeController@page'
                ]
            ); 

Route::get('terms-and-conditions',[
          'as' => 'tNc',
          'uses'  => 'HomeController@tNc'
        ]);

Route::get('privacy-policy',[
          'as' => 'privacy_and_policy',
          'uses'  => 'HomeController@privacypolicy'
        ]);

Route::get('privacypolicy',[
          'as' => 'privacy_and_policy',
          'uses'  => 'HomeController@privacypolicy'
        ]);


Route::get('blog/{id}/{name}',[
          'as' => 'blogDetail',
          'uses'  => 'HomeController@blog'
        ]);




Route::get('faq',[
          'as' => 'faq',
          'uses'  => 'HomeController@faq'
        ]);
 
 Route::match(['post','get'],'career',[
                'as' => 'careerForm',
                'uses' => 'HomeController@career'
                ]
            );  

 Route::match(['post'],'kyc',[
                'as' => 'kycForm',
                'uses' => 'HomeController@kycForm'
                ]
            ); 
Route::match(['post','get'],'free-trial',[
                'as' => 'free-trial',
                'uses' => 'HomeController@freeTrialForm'
                ]
            ); 
 
 Route::match(['post','get'],'life-at-research-infotech',[
                'as' => 'lifeAtResearchInfotech',
                'uses' => 'HomeController@lifeAtResearchInfotech'
                ]
            ); 


Route::get('blog',[
          'as' => 'blog',
          'uses'  => 'HomeController@blog'
        ]);

Route::get('kyc',[
          'as' => 'kyc',
          'uses'  => 'HomeController@kyc'
        ]);

Route::get('risk-tolrance',[
          'as' => 'risk_tolrance',
          'uses'  => 'HomeController@riskTolrance'
        ]);

Route::post('riskTolrance',[
          'as' => 'riskTolranceForm',
          'uses'  => 'HomeController@riskTolranceForm'
        ]);

Route::get('risk-profiling',[
          'as' => 'risk_profiling',
          'uses'  => 'HomeController@riskProfiling'
        ]);

Route::post('riskProfiling',[
          'as' => 'riskProfilingForm',
          'uses'  => 'HomeController@riskProfilingForm'
        ]);


Route::get('discloser',[
          'as' => 'discloser',
          'uses'  => 'HomeController@discloser'
        ]);


Route::match(['get','post'],'checkout/{name}',[
          'as' => 'checkout',
          'uses'  => 'HomeController@checkout'
        ]);

Route::match(['get','post'],'checkOutEBS/{name}',[
          'as' => 'checkOutEbs',
          'uses'  => 'HomeController@checkOutEbs'
        ]);


      Route::match(['get','post'],'paymentConfirm/{name}',[
          'as' => 'paymentConfirm',
          'uses'  => 'HomeController@paymentConfirm'
        ]);


 

Route::match(['get','post'],'paymentStatus/{name}',[
          'as' => 'paymentStatus',
          'uses'  => 'HomeController@paymentStatus'
        ]);


Route::match(['get','post'],'payment/response',[
          'as' => 'paymentResponse',
          'uses'  => 'HomeController@paymentResponse'
        ]);





Route::post('paymentStatus/success',[
          'as' => 'paymentStatus',
          'uses'  => 'HomeController@paymentStatus'
        ]);

Route::match(['get','post'],'status/{name}',[
          'as' => 'paymentStatus',
          'uses'  => 'HomeController@paymentStatus'
        ]);


Route::group(['middleware' => ['web']], function(){
 
  Route::get('auth/logout', 'Auth\AuthController@getLogout');

  Route::get('register',[
          'as' => 'register',
          'uses'  => 'UserController@register'
        ]);    

  Route::post('register',[
          'as' => 'register',
          'uses'  => 'UserController@signup'
        ]);   

  Route::post('signup',[
          'as' => 'signup',
          'uses'  => 'UserController@signup'
        ]); 

  Route::get('login',[
          'as' => 'login',
          'uses'  => 'UserController@showLoginForm'
        ]); 

Route::post('billing',[
          'as' => 'billing',
          'uses'  => 'ProductController@billing'
        ]);

Route::post('shipping',[
          'as' => 'shipping',
          'uses'  => 'ProductController@shipping'
        ]);

Route::post('shippingMethod',[
          'as' => 'shippingMethod',
          'uses'  => 'ProductController@shippingMethod'
        ]);

Route::post('placeOrder',[
          'as' => 'placeOrder',
          'uses'  => 'ProductController@placeOrder'
        ]);


Route::get('orderSuccess',[
          'as' => 'orderSuccess',
          'uses'  => 'ProductController@thankYou'
        ]); 


Route::get('signout', function(App\User $user , Illuminate\Http\Request $request) { 
    
    $request->session()->forget('current_user');
    $request->session()->flush();  

    return redirect()->intended('/'); 

});
   


Route::get('myaccount/login',[
          'as' => 'showLoginForm',
          'uses'  => 'ProductController@showLoginForm'
        ]); 

Route::get('myaccount',[
          'as' => 'myaccount',
          'uses'  => 'ProductController@myaccount'
        ]); 



Route::get('paypal',[
          'as' => 'paypal',
          'uses'  => 'HomeController@paypal'
        ]); 

Route::post('paypal',[
          'as' => 'paypal',
          'uses'  => 'HomeController@paypal'
        ]); 

 
        
Route::get('myaccount/signup',[
          'as' => 'myaccount-signup',
          'uses'  => 'ProductController@showSignupForm'
        ]); 

Route::post('myaccount/signup',[
          'as' => 'userSignup',
          'uses'  => 'UserController@userSignup'
        ]); 
        
        
Route::post('freeTrial',[
          'as' => 'freeTrial',
          'uses'  => 'HomeController@freeTrial'
        ]); 
        

Route::post('login',function(App\User $user , Illuminate\Http\Request $request){ 

      $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];  
       
          if (Auth::attempt($credentials)) {
             $request->session()->put('current_user',Auth::user());
             
                return redirect()->intended('/'); 
          }else{  
              return redirect()
                          ->back()
                          ->withInput()  
                          ->withErrors(['message'=>'Invalid email or password. Try again!']);
              } 
      }); 
             



Route::post('Ajaxlogin',function(App\User $user , Illuminate\Http\Request $request){ 
       
      $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];  
       
          if (Auth::attempt($credentials)) {
             $request->session()->put('current_user',Auth::user());
             $request->session()->put('tab',1);
           
              return Redirect::to(url()->previous());
               // return  json_encode(['msg'=>'success','code'=>200,'data'=>Auth::user()]); 
          }else{  
               return  json_encode(['msg'=>'Invalid email or password','code'=>500,'data'=>$request->all()]); 
              } 
      }); 
             

 });




      
