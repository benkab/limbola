<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Subscription;
use DB;
use Toastr;

class SubscriptionController extends Controller
{
    public function postSubscribe(Request $request)
    {

    	$email			  = $request['email_subs'];

    	// Validate the request
    	$this->validate($request, [
    		'email_subs'		 => 'required | unique:subscriptions,email',
    	]);

    	$suscription 			= new Subscription();
    	$suscription->email 	= $email;

    	// Add to subscription list
    	$suscription->save();

    	Toastr::success('Votre email a &eacute;t&eacute; ajout&eacute; dans notre newsletter', $title = null, $options = [
            "progressBar" => false,
            "positionClass" =>"toast-top-right",
            "preventDuplicates"=> false,
            "showDuration" => 500,
            "hideDuration" => 500,
            "timeOut" => 3000,
            "extendedTimeOut" => 1000,
            "showEasing" => "swing",
            "hideEasing"=> "swing",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
        ]);

    	return redirect()->back();
    }
}
