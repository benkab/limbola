<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Post;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Toastr;

class CommentController extends Controller
{

	// Post a comment
	public function postComment(Request $request, $id)
	{

		$body  = $request['body'];

        // Validate the request
        $this->validate($request, [
            'body'  => 'required | max:1000'
        ]);

        $user = Auth::user();

        $comment 			= new Comment();
        $comment->body 		= $body;
        $comment->user_id 	= $user->id;
        $comment->post_id 	= $id;
        $comment->save();

        Toastr::success('Votre commentaire a &eacute;t&eacute; ajout&eacute;', $title = null, $options = [
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

	// Post a reply
	public function postReply(Request $request, $postId, $parentId)
	{

		$body	= $request->input("reply-{$parentId}");

        if($body){
             $user = Auth::user();

            $reply              = new Comment();
            $reply->body        = $body;
            $reply->user_id     = $user->id;
            $reply->post_id     = $postId;
            $reply->parent_id   = $parentId;
            $reply->save();
        }
       
        Toastr::success('Votre r&eacute;ponse a &eacute;t&eacute; ajout&eacute;', $title = null, $options = [
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


    // Delete comment
    public function getDeleteComment($id)
    {
        $comment = Comment::where('id', $id)->first();

        // Delete post
            $comment->delete();

        Toastr::success('Ce commentaire a &eacute;t&eacute; supprim&eacute;', $title = null, $options = [
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

    // Report comment
    public function getReportComment($id)
    {
        $comment = Comment::where('id', $id)->first();

        $comment->update([
            'reported' => true
        ]);

        Toastr::success('Ce commentaire a &eacute;t&eacute; signal&eacute;', $title = null, $options = [
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

    // Block comment
    public function getBlockComment($id)
    {
        $comment = Comment::where('id', $id)->first();

        $comment->update([
            'status' => false
        ]);

        Toastr::success('Ce commentaire a &eacute;t&eacute; bloqu&eacute;', $title = null, $options = [
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

    // UnBlock comment
    public function getUnBlockComment($id)
    {
        $comment = Comment::where('id', $id)->first();

        $comment->update([
            'status' => true,
            'reported' => false
        ]);

        Toastr::success('Ce commentaire a &eacute;t&eacute; reapprouv&eacute;', $title = null, $options = [
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

    // Comments
    public function getComments(){

        $comments = Comment::where('status', true)->where('reported', false)->paginate(10);
        $reported = Comment::where('reported', true)->where('status', true)->get();
        $blocked  = Comment::where('status', false)->get();

        return view('admin.views.comments.index', ['comments' => $comments, 'reported' => $reported, 'blocked' => $blocked]);
    }



}
