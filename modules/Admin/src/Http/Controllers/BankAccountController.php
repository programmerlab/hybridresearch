<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\BankAccountRequest;
use Modules\Admin\Models\User;
use Modules\Admin\Models\BankAccount;
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
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use App\Helpers\Helper;

/**
 * Class AdminController
 */
class BankAccountController extends Controller {
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
        View::share('viewPage', 'Bank Account');
        View::share('helper',new Helper);
        $this->record_per_page = Config::get('app.record_per_page');
    }

    
    /*
     * Dashboard
     * */

    public function index(BankAccount $bankAccount, Request $request) 
    { 
        $page_title = 'Bank Account';
        $page_action = 'View Bank Account'; 
        $bankAccount = BankAccount::orderBy('id','desc')->Paginate($this->record_per_page);
        
        return view('packages::bankAccount.index', compact('bankAccount', 'page_title', 'page_action'));
    }

    /*
     * create Group method
     * */

    public function create(BankAccount $bankAccount) 
    {
        $page_title = 'Bank Account';
        $page_action = 'Create Bank Account';

        return view('packages::bankAccount.create', compact('bankAccount', 'page_title', 'page_action'));
    }

    /*
     * Save Group method
     * */

    public function store(BankAccountRequest $request, BankAccount $bankAccount) {
        $bankAccount->fill(Input::all());  
        $bankAccount->save(); 
       
        return Redirect::to(route('bankAccount'))
                            ->with('flash_alert_notice', 'Bank Account was successfully created !');
        }

    /*
     * Edit Group method
     * @param 
     * object : $user
     * */

    public function edit(BankAccount $bankAccount) {

        $page_title = 'Bank Account';
        $page_action = 'Edit Bank Account'; 
        
        return view('packages::bankAccount.edit', compact('bankAccount', 'page_title', 'page_action'));
    }

    public function update(Request $request, BankAccount $bankAccount) {
        
        $bankAccount->fill(Input::all()); 
        $bankAccount->save();
        return Redirect::to(route('bankAccount'))
                        ->with('flash_alert_notice', 'Bank Account was  successfully updated !');
    }
    /*
     *Delete $bankAccount
     * @param ID
     * 
     */
    public function destroy(BankAccount $bankAccount) {
        
        BankAccount::where('id',$bankAccount->id)->delete();

        return Redirect::to(route('bankAccount'))
                        ->with('flash_alert_notice', 'Bank Account was successfully deleted!');
    }

    public function show(BankAccount $bankAccount) {
        
    }

}
