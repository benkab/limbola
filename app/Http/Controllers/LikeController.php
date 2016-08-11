<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\User;
use App\Post;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;
use Toastr;

class LikeController extends Controller
{
    public function getLike($id)
    {
    	$user 	= Auth::user();

        $like = $user->likes()->where('post_id', $id)->first();

        if($like == null)
        {
            $new_Like           = new Like();
            $new_Like->liked    = true;
            $new_Like->user_id  = Auth::user()->id;
            $new_Like->post_id  = $id;

            $new_Like->save();

        }
        else{

            $like->liked    = true;
            $like->user_id  = Auth::user()->id;
            $like->post_id  = $id;
            $like->update();
        }
    	
        Toastr::success('Vous avez aim&eacute; cet article', $title = null, $options = [
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

    public function getDislike($id)
    {
        $user   = Auth::user();

        $like = $user->likes()->where('post_id', $id)->first();

            $like->liked    = false;
            $like->user_id  = Auth::user()->id;
            $like->post_id  = $id;
            $like->update();

        Toastr::success("Vous n'aimez plus cet article", $title = null, $options = [
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
