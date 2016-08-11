<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Image;
use DB;
use Toastr;


class UserController extends Controller
{
    // Retrieves users
    public function getUsers()
    {
    	$users = User::paginate(6);
        $roles = Role::all();

        return view('admin.views.users.index', ['users' => $users, 'roles' => $roles]);
    }

    // Get all visitors
    public function getVisitors()
    {
        $users = User::paginate(10);

        return view('admin.views.visitors.index', ['users' => $users]);
    }

    // Block user
    public function blockUser($id)
    {
        $user = User::where('id', $id)->first();

        // Delete post
        $user->update([
            'status' => false
        ]);

        Toastr::success('Ce visiteur a &eacute;t&eacute; bloq&eacute;', $title = null, $options = [
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

    // unBlock user
    public function unblockUser($id)
    {
        $user = User::where('id', $id)->first();

        // Delete post
        $user->update([
            'status' => true
        ]);

        Toastr::success('Ce visiteur a &eacute;t&eacute; d&eacute;bloq&eacute;', $title = null, $options = [
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

    // Post user
    public function postUser(Request $request)
    {
    	// Retrieve data from the request
    	$firstname		= $request['Prenom'];
    	$lastname		  = $request['Nom'];
    	$email			  = $request['email'];
    	$password		  = $request['password'];
        $role           = $request['role'];

    	// Validate the request
    	$this->validate($request, [
    		'Prenom'			=> 'alpha | max:50 | required',
    		'Nom'				=> 'alpha | max:50 | required',
    		'email'				=> 'required',
            'password'          => 'required | min:6',
            'confirmpassword'   => 'required | min:6 | same:password',
            'role'              => 'required'
    	]);

    	// Create an instance of the User
    	$user 				= new User();
    	$user->firstname 	= $firstname;
    	$user->lastname 	= $lastname;
    	$user->email 		= $email;
    	$user->password 	= bcrypt($password);
    	$user->status 		= true;
        $user->confirmed    = true;

    	// Create the user
    	$user->save();

        // Attach a role
        $user->roles()->attach($role);

        Toastr::success('Un nouvel agent a &eacute;t&eacute; ajout&eacute;', $title = null, $options = [
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

        return redirect()->route('view_users');

    }

    // User profile
    public function getUserProfile($id)
    {
      return view('admin.views.profile.index');
    }

    // Get sign in
    public function getSignin(){

    	return view('admin.login');
    }

    // Post sign in
    public function postSignin(Request $request)
    {

    	// Retrieve data from the request
    	$email		= $request['email'];
    	$password	= $request['password'];

    	// Validate the request
    	$this->validate($request, [
    		'email'		=> 'required',
    		'password'	=> 'required'
    	]);

    	if(Auth::attempt(['email' => $email, 'password' => $password]))
    	{
    		return redirect()->route('view_posts');
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

    // Get logout
    public function getSignout()
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

        return redirect()->route('home');
    }

    // Update user profile
    public function postUserProfile(Request $request)
    {
        // Retrieve data from the request
        $email       = $request['email'];
        $firstname   = $request['Prenom'];
        $lastname    = $request['Nom'];

        // Validate the request
        $this->validate($request, [
            'Prenom'            => 'alpha | max:50 | required',
            'Nom'               => 'alpha | max:50 | required',
            'email'             => 'required'
        ]);

        Auth::user()->firstname    = $firstname;
        Auth::user()->lastname     = $lastname;
        Auth::user()->email        = $email;

        Auth::user()->update();

        return redirect()->back();

    }

    // Reset password
    public function upload_avatar(Request $request)
    {

        // Validate the request
        $this->validate($request, [
            'avatar'            => 'required'
        ]);

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){

            $avatar = $request->file('avatar');

            // Set the file name
            $filename = Auth::user()->firstname . '_' . Auth::user()->lastname . '_' .time() . '.'. $avatar->getClientOriginalExtension();


            // Delete user's previous pictures
            $path = '../public/uploads/avatars/' . Auth::user()->firstname . '_' . Auth::user()->lastname  . '*';
            $files = glob($path);
            foreach ($files as $file) {
              unlink($file);
            }

            // Add new image to the public folder
            Image::make($avatar)->save(public_path('/uploads/avatars/' . $filename));

            // Add new image to the database
            $user = Auth::user();
            $user->avatar = $filename;

            $user->update();
        }

        Toastr::success('Votre photo de profile mis &agrave; jour', $title = null, $options = [
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

    // Delete user
    public function deleteUser($id)
    {
        $user = User::find($id);

            // Delete user's previous pictures
            $path = '../public/uploads/avatars/' . $user->firstname . '_' . $user->lastname  . '*';
            $files = glob($path);
            foreach ($files as $file) {
              unlink($file);
            }
        $user->delete();

        Toastr::success('Cet utilisateur a &eacute;t&eacute; supprim&eacute;', $title = null, $options = [
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

    // Edit user
    public function getUserRole($id)
    {
        $user_edit = User::where('id', $id)->first();
        $users = User::paginate(6);
        $roles = Role::all();

        return view('admin.views.users.edit', ['users' => $users, 'roles' => $roles, 'user_edit' => $user_edit]);

    }

    // Post edited user
    public function postUserRole($id, Request $request)
    {

        // Retrieve data from the request
        $role           = $request['role'];

        // Validate the request
        $this->validate($request, [
            'role'              => 'required'
        ]);

        // Create an instance of the User
        $user = User::find($id);

        // Attach a role
        $user->roles()->sync($role);


        Toastr::success('Cet utilisateur a &eacute;t&eacute; mis &agrave; jour', $title = null, $options = [
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

        return redirect()->route('view_users');


    }

    public function getChangePassword(Request $request)
    {

        $myEmail = $request['my_email'];

        $check  = User::where('email', $myEmail)->count();

        if($check == 1)
        {
          return redirect()->back();
        }
        else{

          Toastr::error('Pas de compte li&eacute; &agrave; cette addresse email', $title = null, $options = [
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

    // Reset password
    public function getPasswordReset()
    {
      return view('public.views.profile.password');
    }

    // Post Reset password
    public function postPasswordReset(Request $request)
    {
    	// Retrieve data from the request
    	$email			  = $request['email'];
    	$password		  = $request['password'];

    	// Validate the request
    	$this->validate($request, [
    		'email'				     => 'required',
        'password'         => 'required | min:6',
        'confirmpassword'  => 'required | min:6 | same:password'
    	]);

        return redirect()->back();
    	// Create an instance of the User


        //return redirect()->route('view_users');

    }


}
