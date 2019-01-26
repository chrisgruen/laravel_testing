<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;


class AdminController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    	$this->item_per_page = 15;
    }

    /**
     * View List all Users.
     */
    public function index(Request $request)
    {
   		$user_query = User::query();
   		if ($request->has('vtiger_org')) { 
   			$vtiger_org = $request->vtiger_org;
   			$user_query->whereHas('account', function ($query) use ($vtiger_org) {
   				$query->where('Organization_name', 'like', "%$vtiger_org%");
   			})->get();
   		}
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
    	dd($request->all());
    	return view('admin.fcreateUser');
    }
    
}
