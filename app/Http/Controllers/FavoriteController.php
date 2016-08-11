<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
use App\User;
use App\Post;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;
use Toastr;

class FavoriteController extends Controller
{
    public function postFavorite($id)
    {
    	$user 	= Auth::user();

        $favorite = $user->favorites()->where('post_id', $id)->first();

        if($favorite == null)
        {
            $new_favorite           = new Favorite();
            $new_favorite->favorite = true;
            $new_favorite->user_id  = Auth::user()->id;
            $new_favorite->post_id  = $id;

            $new_favorite->save();

        }
        else{

            $favorite->favorite    = true;
            $favorite->user_id  	= Auth::user()->id;
            $favorite->post_id  	= $id;
            $favorite->update();
        }
    	
        Toastr::success('Acticle ajout&eacute; dans vos favories', $title = null, $options = [
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

    public function postNotFavorite($id)
    {
        $user   = Auth::user();

        $favorite = $user->favorites()->where('post_id', $id)->first();

            $favorite->favorite    	= false;
            $favorite->user_id  	= Auth::user()->id;
            $favorite->post_id  	= $id;
            $favorite->update();

        Toastr::success('Acticle retir&eacute; de vos favories', $title = null, $options = [
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
