<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Http\Requests;
use DB;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
    	$query = $request->input('query');

    	if(!$query){
    		return redirect()->route('home');
    	}

    	$posts = Post::where('title', 'LIKE', "%{$query}%")->get();

    	return view('public.views.search.index', ['query' => $query, 'posts' => $posts]);
    }
}
