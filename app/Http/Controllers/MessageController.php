<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Message;
use DB;
use Toastr;

class MessageController extends Controller
{
    public function postMessage(Request $request)
    {
    	// Retrieve data from the request
    	$firstname		  = $request['firstname'];
    	$lastname		  = $request['lastname'];
    	$email			  = $request['email'];
    	$message		  = $request['message'];

    	// Validate the request
    	$this->validate($request, [
    		'firstname'	 => 'alpha | max:50 | required',
    		'lastname'	 => 'alpha | max:50 | required',
    		'email'		 => 'required',
            'message'    => 'required | min:10 | max: 1000'
    	]);

    	// Create an instance of the Message
    	$theMessage 			= new Message();
    	$theMessage->firstname 	= $firstname;
    	$theMessage->lastname 	= $lastname;
    	$theMessage->email 		= $email;
    	$theMessage->message 	= $message;
    	// Create the user
    	$theMessage->save();

        Toastr::success('Votre message a &eacute;t&eacute; envoy&eacute;', $title = null, $options = [
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
