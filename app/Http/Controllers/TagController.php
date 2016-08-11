<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use DB;
use Toastr;

use App\Http\Requests;

class TagController extends Controller
{
	// Retrieve Tags
    public function getTags()
    {

    	$tags       = Tag::paginate(10);

        return view('admin.views.tags.index', ['tags' => $tags]);
    }

    // Post Tag
    public function postTag(Request $request)
    {
    	// Retrieve data from the request
    	$description	= $request['description'];
    	$status			= 0;


    	// Validate the request
    	$this->validate($request, [
    		'description'		=> 'alpha | max:50 | required | unique:tags,description'
    	]);


    	// Create an instance of the Tag
    	$tag 				= new Tag();
    	$tag->description 	= $description;
    	$tag->status 		= $status;

    	// Create the user
    	$tag->save();

        Toastr::success('Un nouveau mot cl&eacute; a &eacute;t&eacute; ajout&eacute;', $title = null, $options = [
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
    	
        return redirect()->route('view_tags');


    }

    // Edit Tag
    public function editTag(Request $request, $id)
    {

    	$tag = Tag::where('id', $id)->first();

    	$tags = Tag::paginate(10);

    	return view('admin.views.tags.edit', ['tags' => $tags, 'tag' => $tag]);
    }

    // Post Edited Tag
    public function postEditedPost(Request $request, $id)
    {
    	$tag = Tag::where('id', $id)->first();

    	// Retrieve data from the request
    	$description	= $request['description'];

    	// Validate the request
    	$this->validate($request, [
    		'description'		=> 'alpha | max:50 | required | unique:tags,description'
    	]);

    	$tag->description 	= $description;
    	$tag->update();

        Toastr::success('Ce mot cl&eacute; a &eacute;t&eacute; mis a jour', $title = null, $options = [
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

    	return redirect()->route('view_tags');

    }

    // Delete Tag
    public function deleteTag($id)
    {
    	$tag = Tag::where('id', $id)->first();
    	$tag->delete();

        Toastr::success('Ce mot cl&eacute; a &eacute;t&eacute; supprim&eacute;', $title = null, $options = [
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
