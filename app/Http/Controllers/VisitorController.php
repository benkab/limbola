<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\Lymstyle;
use App\Legende;
use App\Favorite;
use DB;
use Toastr;

class VisitorController extends Controller
{
    public function getVisitor()
    {
        $tags = Tag::all();

        return view('public.views.identification.index', ['tags' => $tags]);
    }

    public function postLoginVisitor(Request $request)
    {
    	// Retrieve data from the request
    	$email		= $request['email'];
    	$password	= $request['password'];

    	// Validate the request
    	$this->validate($request, [
    		'email'		=> 'required',
    		'password'	=> 'required'
    	]);

    	if(Auth::attempt(['email' => $email, 'password' => $password, 'confirmed' => 1, 'status' => 1]))
    	{

            Toastr::success('Vous &ecirc;tes maintenant connect&eacute;', $title = null, $options = [
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
    		return redirect()->route('home');
    		
    	}

        Toastr::error('Connection refus&eacute;e avec ces identifiants', $title = null, $options = [
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

    public function postNewVisitor(Request $request)
    {
    	// Retrieve data from the request
    	$firstname		= $request['firstname'];
    	$lastname		= $request['lastname'];
    	$email			= $request['email_inscription'];
    	$password		= $request['password_inscription'];

    	$confirmToken 	= str_random(50);
    	$role  			= 3;

    	// Validate the request
    	$this->validate($request, [
    		'firstname'			=> 'alpha | max:50 | required',
    		'lastname'			=> 'alpha | max:50 | required',
    		'email_inscription'				=> 'required | unique:users,email',
            'password_inscription'          => 'required | min:6',
            'confirmpassword'   => 'required | min:6 | same:password_inscription'
    	]);

    	// Create an instance of the User
    	$user 				= new User();
    	$user->firstname 	= $firstname;
    	$user->lastname 	= $lastname;
    	$user->email 		= $email;
    	$user->password 	= bcrypt($password);
    	$user->status 		= true;
        $user->confirmed    = true;
        $user->confirmToken = $confirmToken;

    	// Create the user
    	$user->save();

        // Attach a role
        $user->roles()->attach($role);

        Auth::login($user);

        Toastr::success('Vous &ecirc;tes maintenant connec&eacute;', $title = null, $options = [
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

        // // Sending the email
        // Mail::send('mails.email_verification', ['confirmation_code' => $confirmToken], function($message)
        // {
        // 	$message->to(Input::get('email_inscription'), Input::get('lastname'))
        // 			->subject('Validation de votre compte sur Limbola Magazine');
        // });

       // alert()->success('Success', 'Votre compte membre a ete cree, votre confirmer votre inscription en clickant sur le lien envoyer dans votre email');
        

        return redirect()->route('home');
    }

    public function getLogOut()
    {
    	Auth::logout();

        Toastr::success('Vous &ecirc;tes maintenant d&eacute;connec&eacute;', $title = null, $options = [
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

        return redirect()->route('identification');
    }

    public function getVisitorProfile($id)
    {
        $lymstyles    = Lymstyle::where('status', true)->get();
        $legendes     = Legende::where('status', true)->get();

        $tags  = Tag::all();

        $user = Auth::user();

        $posts = Post::with('user')->whereHas('favorites', function ($query) use ($user) {
                                        $query->where('user_id', '=', $user->id)->where('favorite', true);
                                    })->get();




        //Auth::user()->favorites()->where('favorite', true)->get();



       // dd($posts);


        return view('public.views.profile.index', ['user' => $user, 'lymstyles' => $lymstyles, 'tags' => $tags, 'legendes' => $legendes, 'posts' => $posts]);
    }

    public function postDeleteAccount()
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        Toastr::success('Votre compte a &eacute;t&eacute; supprim&eacute;', $title = null, $options = [
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

        return redirect()->route('identification');

    }
}
