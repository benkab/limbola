<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Lymstyle;
use App\Legende;
use App\Tag;
use App\View;
use App\Http\Requests;
use Toastr;
use DB;

class LimbolaController extends Controller
{

    public function getPublic()
    {
        $posts = Post::take(6)->get();
        $lymstyles     = Lymstyle::where('status', true)->take(3)->get();
        $legendes     = Legende::where('status', true)->take(3)->get();
        
        return view('public.views.index', ['lymstyles' => $lymstyles, 'legendes' => $legendes, 'posts' => $posts]);
    }

    // Get index
    public function getLymstyles()
    {

        $lymstyles     = Lymstyle::where('status', true)->paginate(3);

        $tags  = Tag::all();

    	return view('public.views.lymstyle.index', ['lymstyles' => $lymstyles, 'tags' => $tags]);
    }

    // Get single lymstyle
    public function getLymstyle($slug)
    {
    	$lymstyle   = Lymstyle::where('slug', $slug)->first();

        $tags   = Tag::all();

        $suggestions    = Lymstyle::where('slug', '!=', $slug)->take(2)->get();
        $lus            = Lymstyle::where('slug', '!=', $slug)->take(3)->get();

        // Post 
        $post = Post::where('id', $lymstyle->post_id)->first();
        $view = View::where('post_id', $lymstyle->post_id)->first();

        // Update number of views
        if($view)
        {
            DB::table('views')->where('post_id', $lymstyle->post_id)->increment('number');
        }
        else{

            $newView = new View();
            $newView->number   = 1;
            $newView->post_id  = $post->id;
            $newView->save();
        }

    	return view('public.views.lymstyle.view', ['lymstyle' => $lymstyle, 'tags' => $tags, 'suggestions' => $suggestions, 'lus' => $lus]);
    }

    // Get Legende
    public function getLegende($slug)
    {
        $legende   = Legende::where('slug', $slug)->first();

        $tags   = Tag::all();

        $suggestions = Legende::where('slug', '!=', $slug)->take(2)->get();
        $lus         = Legende::where('slug', '!=', $slug)->take(3)->get();

        // Post 
        $post = Post::where('id', $legende->post_id)->first();
        $view = View::where('post_id', $legende->post_id)->first();

        // Update number of views
        if($view)
        {
            DB::table('views')->where('post_id', $legende->post_id)->increment('number');
        }
        else{

            $newView = new View();
            $newView->number   = 1;
            $newView->post_id  = $post->id;
            $newView->save();
        }

        return view('public.views.legende.view', ['legende' => $legende, 'tags' => $tags, 'suggestions' => $suggestions, 'lus' => $lus]);
    }

    // get Legendes
    public function getLegendes()
    {
        $legendes     = Legende::where('status', true)->paginate(6);
        $tags   = Tag::all();

        return view('public.views.legende.index', ['legendes' => $legendes, 'tags' => $tags]);
    }


    // Get Contacts
    public function getContacts()
    {
        return view('public.views.contacts.index');
    }
}
