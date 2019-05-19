<?php

      Route::get('admin/login','Modules\Admin\Http\Controllers\AuthController@index');
      Route::get('logout','Modules\Admin\Http\Controllers\AuthController@logout');  
      Route::get('admin/signUp','Modules\Admin\Http\Controllers\AuthController@signUp'); 
      Route::post('admin/registration','Modules\Admin\Http\Controllers\AuthController@registration'); 
      
      Route::post('admin/login',function(App\Admin $user){
        $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')]; 
            $auth = auth()->guard('admin');
        
            if ($auth->attempt($credentials)) {
                return Redirect::to('admin');
            }else{ 
                return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['message'=>'Invalid email or password. Try again!']);
                } 
        }); 
      
    Route::group(['middleware' => ['admin']], function () { 

        Route::get('admin', 'Modules\Admin\Http\Controllers\AdminController@index');
        
        /*------------User Model and controller---------*/

        Route::bind('user', function($value, $route) {
            return Modules\Admin\Models\User::find($value);
        });

        Route::resource('admin/user', 'Modules\Admin\Http\Controllers\UsersController', [
            'names' => [
                'edit' => 'user.edit',
                'show' => 'user.show',
                'destroy' => 'user.destroy',
                'update' => 'user.update',
                'store' => 'user.store',
                'index' => 'user',
                'create' => 'user.create',
            ]
                ]
        );
        
        //=============bankaccount
        
        Route::bind('bankAccount', function($value, $route) {
            return Modules\Admin\Models\BankAccount::find($value);
        });

        Route::resource('admin/bankAccount', 'Modules\Admin\Http\Controllers\BankAccountController', [
            'names' => [
                'edit' => 'bankAccount.edit',
                'show' => 'bankAccount.show',
                'destroy' => 'bankAccount.destroy',
                'update' => 'bankAccount.update',
                'store' => 'bankAccount.store',
                'index' => 'bankAccount',
                'create' => 'bankAccount.create',
            ]
                ]
        );
        
        
        /*---------End---------*/   
  
        /*------------User Category and controller---------*/

            Route::bind('category', function($value, $route) {
                return Modules\Admin\Models\Category::find($value);
            });
     
            Route::resource('admin/category', 'Modules\Admin\Http\Controllers\CategoryController', [
                'names' => [
                    'edit' => 'category.edit',
                    'show' => 'category.show',
                    'destroy' => 'category.destroy',
                    'update' => 'category.update',
                    'store' => 'category.store',
                    'index' => 'category',
                    'create' => 'category.create',
                ]
                    ]
            );
        /*---------End---------*/   


        /*------------User Category and controller---------*/

            Route::bind('sub-category', function($value, $route) {
                return Modules\Admin\Models\SubCategory::find($value);
            });
     
            Route::resource('admin/sub-category', 'Modules\Admin\Http\Controllers\SubCategoryController', [
                'names' => [
                    'edit' => 'sub-category.edit',
                    'show' => 'sub-category.show',
                    'destroy' => 'sub-category.destroy',
                    'update' => 'sub-category.update',
                    'store' => 'sub-category.store',
                    'index' => 'sub-category',
                    'create' => 'sub-category.create',
                ]
                    ]
            );
        /*---------End---------*/    

        Route::bind('product', function($value, $route) {
            return Modules\Admin\Models\Product::find($value);
        });
 
        Route::resource('admin/product', 'Modules\Admin\Http\Controllers\ProductController', [
            'names' => [
                'edit' => 'product.edit',
                'show' => 'product.show',
                'destroy' => 'product.destroy',
                'update' => 'product.update',
                'store' => 'product.store',
                'index' => 'product',
                'create' => 'product.create',
            ]
                ]
        ); 

        Route::bind('transaction', function($value, $route) {
            return Modules\Admin\Models\Transaction::find($value);
        });
 
        Route::resource('admin/transaction', 'Modules\Admin\Http\Controllers\TransactionController', [
            'names' => [
                'edit' 		=> 'transaction.edit',
                'show' 		=> 'transaction.show',
                'destroy' 	=> 'transaction.destroy',
                'update' 	=> 'transaction.update',
                'store' 	=> 'transaction.store',
                'index' 	=> 'transaction',
                'create' 	=> 'transaction.create',
            ]
                ]
        ); 

        Route::bind('setting', function($value, $route) {
            return Modules\Admin\Models\Settings::find($value);
        });
 
        Route::resource('admin/setting', 'Modules\Admin\Http\Controllers\SettingsController', [
            'names' => [
                'edit'      => 'setting.edit',
                'show'      => 'setting.show',
                'destroy'   => 'setting.destroy',
                'update'    => 'setting.update',
                'store'     => 'setting.store',
                'index'     => 'setting',
                'create'    => 'setting.create',
            ]
                ]
        ); 


          Route::bind('page', function($value, $route) {
            return Modules\Admin\Models\Pages::find($value);    
        });
 
        Route::resource('admin/page', 'Modules\Admin\Http\Controllers\PageController', [
            'names' => [
                'edit'      => 'page.edit',
                'show'      => 'page.show',
                'destroy'   => 'page.destroy',
                'update'    => 'page.update',
                'store'     => 'page.store',
                'index'     => 'page',
                'create'    => 'page.create',
            ]
                ]
        ); 
        
        
        Route::bind('contact', function($value, $route) {
            return Modules\Admin\Models\Contact::find($value);
        });
 
        Route::resource('admin/contact', 'Modules\Admin\Http\Controllers\ContactController', [
            'names' => [
                'edit' => 'contact.edit',
                'show' => 'contact.show',
                'destroy' => 'contact.destroy',
                'update' => 'contact.update',
                'store' => 'contact.store',
                'index' => 'contact',
                'create' => 'contact.create',
            ]
                ]
        );  

        Route::bind('comment', function($value, $route) {
            return Modules\Admin\Models\Comments::find($value);
        });
 
        Route::resource('admin/comment', 'Modules\Admin\Http\Controllers\CommentController', [
            'names' => [
                'edit' => 'comment.edit',
                'show' => 'comment.show',
                'destroy' => 'comment.destroy',
                'update' => 'comment.update',
                'store' => 'comment.store',
                'index' => 'comment',
                'create' => 'comment.create',
            ]
                ]
        );  
        
        
        Route::bind('service', function($value, $route) {
            return Modules\Admin\Models\Category::find($value);
        });
 
        Route::resource('admin/service', 'Modules\Admin\Http\Controllers\CategoryController', [
            'names' => [
                'edit' => 'service.edit',
                'show' => 'service.show',
                'destroy' => 'service.destroy',
                'update' => 'service.update',
                'store' => 'service.store',
                'index' => 'service',
                'create' => 'service.create',
            ]
                ]
        ); 

        
        Route::bind('freeTrial', function($value, $route) {
            return Modules\Admin\Models\FreeTrial::find($value);
        });
 
        Route::resource('admin/freeTrial', 'Modules\Admin\Http\Controllers\FreeTrialController', [
            'names' => [
                'edit' => 'freeTrial.edit',
                'show' => 'freeTrial.show',
                'destroy' => 'freeTrial.destroy',
                'update' => 'freeTrial.update',
                'store' => 'freeTrial.store',
                'index' => 'freeTrial',
                'create' => 'freeTrial.create',
            ]
                ]
        ); 
        
        Route::bind('career', function($value, $route) {
            return Modules\Admin\Models\Career::find($value);
        });
 
        Route::resource('admin/career', 'Modules\Admin\Http\Controllers\CareerController', [
            'names' => [
                'edit' => 'career.edit',
                'show' => 'career.show',
                'destroy' => 'career.destroy',
                'update' => 'career.update',
                'store' => 'career.store',
                'index' => 'career',
                'create' => 'career.create',
            ]
                ]
        );
        
        
        Route::bind('pricing', function($value, $route) {
            return Modules\Admin\Models\Product::find($value);
        });
 
        Route::resource('admin/pricing', 'Modules\Admin\Http\Controllers\ProductController', [
            'names' => [
                'edit' => 'pricing.edit',
                'show' => 'pricing.show',
                'destroy' => 'pricing.destroy',
                'update' => 'pricing.update',
                'store' => 'pricing.store',
                'index' => 'pricing',
                'create' => 'pricing.create',
            ]
                ]
        );
        
        Route::bind('payment', function($value, $route) {
            return Modules\Admin\Models\Pricing::find($value);
        });
 
        Route::resource('admin/payment', 'Modules\Admin\Http\Controllers\PaymentController', [
            'names' => [
                'edit' => 'payment.edit',
                'show' => 'payment.show',
                'destroy' => 'payment.destroy',
                'update' => 'payment.update',
                'store' => 'payment.store',
                'index' => 'payment',
                'create' => 'payment.create',
            ]
                ]
        );
        
        
        Route::bind('contactList', function($value, $route) {
            return Modules\Admin\Models\ContactList::find($value);
        });
 
        Route::resource('admin/contactList', 'Modules\Admin\Http\Controllers\ContactListController', [
            'names' => [
                'edit' => 'contactList.edit',
                'show' => 'contactList.show',
                'destroy' => 'contactList.destroy',
                'update' => 'contactList.update',
                'store' => 'contactList.store',
                'index' => 'contactList',
                'create' => 'contactList.create',
            ]
                ]
        );
        
        Route::bind('kyc', function($value, $route) {
            return Modules\Admin\Models\Kyc::find($value);
        });
        Route::get('admin/riskProfile', 'Modules\Admin\Http\Controllers\KycController@riskProfile');

        Route::get('admin/riskProfile/delete/{id}', 'Modules\Admin\Http\Controllers\KycController@riskProfileDel');


        

        Route::resource('admin/kyc', 'Modules\Admin\Http\Controllers\KycController', [
            'names' => [
                'edit' => 'kyc.edit',
                'show' => 'kyc.show',
                'destroy' => 'kyc.destroy',
                'update' => 'kyc.update',
                'store' => 'kyc.store',
                'index' => 'kyc',
                'create' => 'kyc.create'
            ]
                ]
        );
        
        Route::bind('faq', function($value, $route) {
            return Modules\Admin\Models\Faq::find($value);
        });
 
        Route::resource('admin/faq', 'Modules\Admin\Http\Controllers\FaqController', [
            'names' => [
                'edit' => 'faq.edit',
                'show' => 'faq.show',
                'destroy' => 'faq.destroy',
                'update' => 'faq.update',
                'store' => 'faq.store',
                'index' => 'faq',
                'create' => 'faq.create',
            ]
                ]
        );
        
        
        Route::bind('trackSheet', function($value, $route) {
            return Modules\Admin\Models\TrackSheet::find($value);
        });
 
        Route::resource('admin/trackSheet', 'Modules\Admin\Http\Controllers\TrackSheetController', [
            'names' => [
                'edit' => 'trackSheet.edit',
                'show' => 'trackSheet.show',
                'destroy' => 'trackSheet.destroy',
                'update' => 'trackSheet.update',
                'store' => 'trackSheet.store',
                'index' => 'trackSheet',
                'create' => 'trackSheet.create',
            ]
                ]
        );
        
        Route::bind('gallery', function($value, $route) {
            return Modules\Admin\Models\Gallery::find($value);
        });
 
        Route::resource('admin/gallery', 'Modules\Admin\Http\Controllers\GalleryController', [
            'names' => [
                'edit' => 'gallery.edit',
                'show' => 'gallery.show',
                'destroy' => 'gallery.destroy',
                'update' => 'gallery.update',
                'store' => 'gallery.store',
                'index' => 'gallery',
                'create' => 'gallery.create',
            ]
                ]
        );
    
        Route::bind('blog', function($value, $route) {
            return Modules\Admin\Models\Blogs::find($value);
        });
 
        Route::resource('admin/blog', 'Modules\Admin\Http\Controllers\BlogController', [
            'names' => [
                'edit' => 'blog.edit',
                'show' => 'blog.show',
                'destroy' => 'blog.destroy',
                'update' => 'blog.update',
                'store' => 'blog.store',
                'index' => 'blog',
                'create' => 'blog.create',
            ]
                ]
        );

        Route::match(['get','post'],'admin/profile', 'Modules\Admin\Http\Controllers\AdminController@profile'); 
            
  });



 
 
     
 
  