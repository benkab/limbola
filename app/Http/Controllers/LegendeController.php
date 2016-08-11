<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\User;
use App\Post;
use App\Lymstyle;
use App\Legende;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Http\Requests;
use Image;
use DB;
use Toastr;

class LegendeController extends Controller
{
    // Get tags to post with
    public function getPostLegende()
    {
    	$tags = Tag::all();

    	return view('admin.views.posts.legende.create', ['tags' => $tags]);
    }

    // Post post
    public function postLegende(Request $request)
    {

        // Retrieve data from the request
        $title      	= $request['title'];
        $firstname      = $request['firstname'];
        $lastname    	= $request['lastname'];
        $body       	= $request['body'];
        $tags       	= $request['tags'];
        $status     	= $request->input('status', false);
        $now        	= new DateTime();

        // Create the slug
        $slug = str_slug($title, "-");

        $status_bool_value = filter_var($status, FILTER_VALIDATE_BOOLEAN);

        // Validate the request
        $this->validate($request, [
            'title' 		=> 'required',
            'body'  		=> 'required',
            'tags'  		=> 'required',
            'cover' 		=> 'required',
            'firstname'  	=> 'required',
            'lastname'  	=> 'required'
        ]);

            $cover = $request->file('cover');
            $pictureName   = str_random(50);

            // Set the file name
            $filename = $pictureName . '.' . $cover->getClientOriginalExtension();
            
            // Add new image to the public folder
            Image::make($cover)->resize(900, 650)->save(public_path('/uploads/posts/' . $filename));

        // Create an instance of the Post
        $post               = new Post();
        $post->cover        = $filename;
        $post->user_id      = Auth::user()->id;
        $post->published_at = $now;

        // Create the post
        $post->save();

        $post->legende()->create([
        	'title' 	=> $title,
            'slug'  	=> $slug,
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'body'  	=> $body,
            'status'    => $status_bool_value
        ]);
 
        // Save tags
        $post->tags()->sync($tags);

        Toastr::success('Une nouvealle L&eacute;gende a &eacute;t&eacute; ajout&eacute;', $title = null, $options = [
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
        
        return redirect()->route('view_posts');
    }

    // View Post
    public function viewLegende($id)
    {
        $post       = Post::where('id', $id)->first();

        return view('admin.views.posts.legende.view', ['post' => $post]);
    }

    // Get post to edit
    public function getEditLegende($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();

        return view('admin.views.posts.legende.edit', ['post' => $post, 'tags' => $tags]);
    }

    // Post edited post
    public function postEditLegende(Request $request, $id)
    {

        $title      	= $request['title'];
        $body       	= $request['body'];
        $tags       	= $request['tags'];
        $firstname      = $request['firstname'];
        $lastname    	= $request['lastname'];
        $now        = new DateTime();

        // Create the slug
        $slug = str_slug($title, "-");

        // Validate the request
        $this->validate($request, [
            'title'     => 'required',
            'body'      => 'required',
            'tags'      => 'required',
            'firstname' => 'required',
            'lastname'  => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('cover'))
        {

            $cover = $request->file('cover');
            $pictureName   = str_random(50);

            // Set the file name
            $filename = $pictureName . '_'  . $cover->getClientOriginalExtension();

            // Delete user's previous pictures
            $path = '../public/uploads/posts/' . $post->cover  . '*';
            $files = glob($path);
            foreach ($files as $file) {
              unlink($file);
            }
            
            // Add new image to the public folder
            Image::make($cover)->resize(900, 650)->save(public_path('/uploads/posts/' . $filename));

            $post->update([
                'cover' => $filename
            ]);

            $post->legende()->update([
                'title' 		=> $title,
                'slug'  		=> $slug,
                'body' 			=> $body,
                'firstname'  	=> $firstname,
                'lastname'  	=> $lastname
            ]);

            // Save tags
            $post->tags()->sync($tags);
        }
        else{

            $post->legende()->update([
                'title' 		=> $title,
                'slug'  		=> $slug,
                'body' 			=> $body,
                'firstname'  	=> $firstname,
                'lastname'  	=> $lastname
            ]);

            // Save tags
            $post->tags()->sync($tags);
        }

        Toastr::success('Cette l&eacute;gende a &eacute;t&eacute; modifi&eacute;', $title = null, $options = [
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
        return redirect()->route('view_posts');

    }

    // Public post
    public function publishLegende($id)
    {

        $post = Post::where('id', $id)->first();
        $now        = new DateTime();

        // Publish post
        $post->update([
            'published_at'  => $now
        ]);

        $post->legende->update([
            'status' => true
        ]);

        Toastr::success('Cet article a &eacute;t&eacute; publi&eacute;', $title = null, $options = [
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

    // Remove post from timeline
    public function unpublishLegende($id)
    {

        $post = Post::where('id', $id)->first();

        // Delete post
        $post->legende->update([
            'status' => false
        ]);

        Toastr::success('Cet article a &eacute;t&eacute; r&eacute;ti&eacute;', $title = null, $options = [
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
