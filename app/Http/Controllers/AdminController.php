<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    	$this->item_per_page = 15;
    }

    /**
     * View List all Users.
     */
    public function index(Request $request)
    {
    	/* Searchfilter */
   		$user_query = User::query();
   		if ($request->has('nick_name')) {
   			$user_query->where('name', 'like', "%$request->nick_name%");
   		}
   		if ($request->has('last_name')) {
   			$user_query->where('last_name', 'like', "%$request->last_name%");
   		}
   		if ($request->has('first_name')) {
   			$user_query->where('first_name', 'like', "%$request->first_name%");
   		}
   		if ($request->has('email')) {
   			$user_query->where('email', 'like', "%$request->email%");
   		}
   	   	if($request->has('user_start_date') && $request->user_start_date != '' ){
   			$user_query->where('created_at', '>=', "$request->user_start_date");
   			if($request->has('user_end_date') && $request->user_end_date != '' ){
   				$user_query->where('created_at', '<=', "$request->user_end_date");
   			}
   		}
   		if ($request->has('activated')) {
   			if($request->activated != 99){
   			   $user_query->where('active', '=', "$request->activated");
   			}
   		} else {
   			$request->activated = 99;
   		}
   		
   		$users = $user_query->paginate($this->item_per_page); 
   		
   		return view('admin.index', compact('users', 'request'));
    }
    
    /**
     * View form Create a new user.
     */
    public function form_create_user()
    {
       	return view('admin.fcreateUser');
    }
    
    /**
     * Process create a new user.
     */
    public function create_user(Requests\UserRequest $request)
    {
    	
    	/* Create a new user */
    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->last_name = $request->last_name;
    	$user->first_name = $request->first_name;
    	$user->password = bcrypt($request->password);
    	$user->remember_token = Str::random(60);
    	
    	if($request->has('active')){
    		$user->active = 1;
    	} else {
    		$user->active = 0;
    	}
    	
    	$user->save();

    	return redirect('/admin_users/show/'.$user->id);
    }
    
    /**
     * Process delete user.
     */
    public function delete_user($user_id)
    {   	
    	if(User::count() > 1){
    		User::destroy($user_id);
    	}
    	return redirect('/admin_users');
    }
    
    /**
     * View detail user.
     */
    public function show_user($user_id)
    {
    	$user = User::where('id', $user_id)->first();
    	return view('admin.showUser', compact('user'));
    }
    
    /**
     * View form update user
     */
    public function form_edit_user($user_id)
    {
    	$user = User::where('id', $user_id)->first();
    	return view('admin.feditUser', compact('user'));
    }
    
    /**
     * Process update user.
     */
    public function edit_user(Request $request, $userId)
    {   	 
    	/* Validationhandling */
    	$this->validate($request, [
    			'name' => 'required|max:255',
    			'email' => 'required|email|max:255',
    	]);
    	
    	$user = USER::where('id', $userId)->first();
    	
    	/* Update User */
    	$user->update(['name' => $request->name]);
		$user->update(['last_name' => $request->last_name]);
		$user->update(['first_name' => $request->first_name]);		
		/* set User active = (1,0) */
		if($request->has('active')){
			$user->update(['active' => 1]);
		} else {
			$user->update(['active' => 0]);
		}		
		/* update Password  */
		if(strlen($request->password) > 2){
			$this->validate($request, [
					'password' => 'required|min:6',
			]);
			$user->update(['password' => bcrypt(request()->password)]);
		}    	 
    
    	return redirect('/admin_users/show/'.$user->id);
    }
    
    /**
     * Process logout user.
     */    
    public function logout(){
    	Auth::logout();
    	return redirect('login');
    }
    
    /**
     * Ajax cal activate user.
     */
    public function activate_user(Request $request)
    {
    	$user = User::where('id', $request->userId)->first();
    	$user->update(['active' => 1]);
    }
    
    /**
     * Ajax cal deactivate user.
     */
    public function deactivate_user(Request $request)
    {
    	$user = User::where('id', $request->userId)->first();
    	$user->update(['active' => 0]);
    }
}
