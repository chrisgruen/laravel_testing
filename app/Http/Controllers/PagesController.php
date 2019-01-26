<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
   	public function homepublic(){
   	    return view('pagespublic.home');
	}
	
	public function about(){
		return view('pagespublic.about');
	}
	
	public function services(){
		return view('pagespublic.services');
	}
	
	public function contact(){
		return view('pagespublic.contact');
	}

}

