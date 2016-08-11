<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    // routes here
});

// Public
	Route::get('/', [
		'uses' => 'LimbolaController@getPublic',
		'as'   => 'home'
	]);

	Route::get('/lymstyles', [
		'uses' => 'LimbolaController@getLymstyles',
		'as'   => 'lymstyles'
	]);

	Route::get('/legendes', [
		'uses' => 'LimbolaController@getLegendes',
		'as'   => 'legende'
	]);

	Route::get('/article/lymstyle/{slug}', [
		'uses' => 'LimbolaController@getLymstyle',
		'as'   => 'singleLymstyle'
	]);

	Route::get('/article/legende/{slug}', [
		'uses' => 'LimbolaController@getLegende',
		'as'   => 'singleLegende'
	]);

	Route::get('/mail', function(){
		return view('mails.email_verification');
	});

	Route::get('/contacts', [
		'uses' => 'LimbolaController@getContacts',
		'as'   => 'contacts'
	]);

	Route::post('/contacts/message', [
		'uses' => 'MessageController@postMessage',
		'as'   => 'sendMessage'
	]);

	Route::post('/souscrire', [
		'uses' => 'SubscriptionController@postSubscribe',
		'as'   => 'subscribe'
	]);

	Route::get('/profil/supprimer', [
		'uses' => 'VisitorController@postDeleteAccount',
		'as'   => 'delete_account',
	    'middleware' => 'auth'
	]);

// Search
	Route::post('/search', [
		'uses' => 'SearchController@getResults',
		'as'   => 'search.results'
	]);

// Comments
	Route::post('/article/comment/{id}', [
		'uses' => 'CommentController@postComment',
		'as'   => 'post_comment',
	    'middleware' => 'auth'
	]);

	Route::post('/article/comment/repondre/{postId}/{parentId}', [
		'uses' => 'CommentController@postReply',
		'as'   => 'post_reply',
	    'middleware' => 'auth'
	]);

	Route::get('/article/comment/supprimer/{id}', [
		'uses' => 'CommentController@getDeleteComment',
		'as'   => 'delete_comment',
	    'middleware' => 'auth'
	]);

	Route::get('/article/comment/signaler/{id}', [
		'uses' => 'CommentController@getReportComment',
		'as'   => 'report_comment'
	]);

	Route::get('/article/comment/bloquer/{id}', [
		'uses' => 'CommentController@getBlockComment',
		'as'   => 'block_comment'
	]);

	Route::get('/article/comment/debloquer/{id}', [
		'uses' => 'CommentController@getUnBlockComment',
		'as'   => 'unblock_comment'
	]);


// Visitors
	Route::get('/identification', [
		'uses' => 'VisitorController@getVisitor',
		'as'   => 'identification',
		'middleware' => 'guest',
	]);

	Route::post('/identification/login', [
		'uses' => 'VisitorController@postLoginVisitor',
		'as'   => 'login_visitor',
		'middleware' => 'guest',
	]);

	Route::post('/identification/nouveau', [
		'uses' => 'VisitorController@postNewVisitor',
		'as'   => 'new_visitor',
		'middleware' => 'guest',
	]);

	Route::get('/identification/logout', [
		'uses' => 'VisitorController@getLogOut',
		'as'   => 'logout_visitor'
	]);

	Route::get('/profil/utilisateur/{id}', [
		'uses' => 'VisitorController@getVisitorProfile',
		'as'   => 'visitor_profile',
	    'middleware' => 'auth',
	]);



// Tasks
	Route::get('/limbola/admin/tasks', [
		'uses' => 'TaskController@getTasks',
		'as'   => 'view_tasks',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/task/edit/{id}', [
		'uses' => 'TaskController@getEditTask',
		'as'   => 'edit_task',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::post('/limbola/admin/task/edit/{id}', [
		'uses' => 'TaskController@postEditTask',
		'as'   => 'post_edited_task',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::post('/limbola/admin/tasks', [
		'uses' => 'TaskController@postTask',
		'as'   => 'post_task',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/tasks/delete/{id}', [
		'uses' => 'TaskController@getDeleteTask',
		'as'   => 'delete_task',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/tasks/secondaire/{id}', [
		'uses' => 'TaskController@getSecondaireTask',
		'as'   => 'set_as_secondaire',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/tasks/urgent/{id}', [
		'uses' => 'TaskController@getUrgentTask',
		'as'   => 'set_as_urgent',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);




// Comments
	Route::get('/limbola/admin/comments', [
		'uses' => 'CommentController@getComments',
		'as'   => 'view_comments',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

// Visitors
	Route::get('/limbola/admin/visitors', [
		'uses' => 'UserController@getVisitors',
		'as'   => 'view_visitors',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::get('/limbola/admin/visitor/block/{id}', [
		'uses' => 'UserController@blockUser',
		'as'   => 'block',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::get('/limbola/admin/visitor/unblock/{id}', [
		'uses' => 'UserController@unblockUser',
		'as'   => 'unblock',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

// Posts
	Route::get('/limbola/admin/limStyle', [
		'uses' => 'PostController@getLimStyles',
		'as'   => 'view_lymstyle_page',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/legendes', [
		'uses' => 'PostController@getLegendes',
		'as'   => 'view_legendes_page',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/posts/lymstyle/create', [
		'uses' => 'PostController@getPostPost',
		'as'   => 'new_lymstyle',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::post('/limbola/admin/posts/lymstyle/create', [
		'uses' => 'PostController@postLymStyle',
		'as'   => 'new_post',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/post/view/lymstyle/{id}', [
		'uses' => 'PostController@viewPost',
		'as'   => 'view_lymstyle',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/post/delete/{id}', [
		'uses' => 'PostController@deletePost',
		'as'   => 'delete_post',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::get('/limbola/admin/post/publish/lymstyle/{id}', [
		'uses' => 'PostController@publishLymstyle',
		'as'   => 'publier_lymstyle',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::get('/limbola/admin/post/unplublish/lymstyle/{id}', [
		'uses' => 'PostController@unpublishLymstyle',
		'as'   => 'retirer_lymstyle',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::get('/limbola/admin/post/lymstyle/edit/{id}', [
		'uses' => 'PostController@getEditLymStyle',
		'as'   => 'edit_lymstyle',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::post('/limbola/admin/post/lymstyle/edit/{id}', [
		'uses' => 'PostController@postEditLymStyle',
		'as'   => 'post_edit_lymstyle',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	// Legendes
		Route::get('/limbola/admin/posts/legende/create', [
			'uses' => 'LegendeController@getPostLegende',
			'as'   => 'new_legende',
		    'middleware' => 'auth',
		    'middleware' => 'roles',
		    'roles'	=> ['Administrateur', 'Redacteur']
		]);

		Route::post('/limbola/admin/posts/legende/create', [
			'uses' => 'LegendeController@postLegende',
			'as'   => 'new_legende',
		    'middleware' => 'auth',
		    'middleware' => 'roles',
		    'roles'	=> ['Administrateur', 'Redacteur']
		]);

		Route::get('/limbola/admin/post/view/legende/{id}', [
			'uses' => 'LegendeController@viewLegende',
			'as'   => 'view_legende',
		    'middleware' => 'auth',
		    'middleware' => 'roles',
		    'roles'	=> ['Administrateur', 'Redacteur']
		]);

		Route::get('/limbola/admin/post/legende/edit/{id}', [
			'uses' => 'LegendeController@getEditLegende',
			'as'   => 'edit_legende',
		    'middleware' => 'auth',
		    'middleware' => 'roles',
		    'roles'	=> ['Administrateur', 'Redacteur']
		]);

		Route::post('/limbola/admin/post/legende/edit/{id}', [
			'uses' => 'LegendeController@postEditLegende',
			'as'   => 'post_edit_legende',
		    'middleware' => 'auth',
		    'middleware' => 'roles',
		    'roles'	=> ['Administrateur', 'Redacteur']
		]);

		Route::get('/limbola/admin/post/publish/legende/{id}', [
			'uses' => 'LegendeController@publishLegende',
			'as'   => 'publier_Legende',
		    'middleware' => 'auth',
		    'middleware' => 'roles',
		    'roles'	=> 'Administrateur'
		]);

		Route::get('/limbola/admin/post/unplublish/legende/{id}', [
			'uses' => 'LegendeController@unpublishLegende',
			'as'   => 'retirer_Legende',
		    'middleware' => 'auth',
		    'middleware' => 'roles',
		    'roles'	=> 'Administrateur'
		]);

// Likes
	Route::get('/limbola/admin/post/{id}/like', [
		'uses' => 'LikeController@getLike',
		'as'   => 'like',
	    'middleware' => 'auth'
	]);

	Route::get('/limbola/admin/post/{id}/dislike', [
		'uses' => 'LikeController@getDislike',
		'as'   => 'dislike',
	    'middleware' => 'auth'
	]);

// Favorites
	Route::get('/limbola/admin/post/{id}/favorite', [
		'uses' => 'FavoriteController@postFavorite',
		'as'   => 'favorite',
	    'middleware' => 'auth'
	]);

	Route::get('/limbola/admin/post/{id}/notfavorite', [
		'uses' => 'FavoriteController@postNotFavorite',
		'as'   => 'notfavorite',
	    'middleware' => 'auth'
	]);

// Tags
	Route::get('/limbola/admin/tags', [
		'uses' => 'TagController@getTags',
		'as'   => 'view_tags',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/tag/edit/{id}', [
		'uses' => 'TagController@editTag',
		'as'   => 'tag.edit',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::get('/limbola/admin/tag/remove/{id}', [
		'uses' => 'TagController@deleteTag',
		'as'   => 'tag.remove',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::post('/limbola/admin/tags', [
		'uses' => 'TagController@postTag',
		'as'   => 'tags',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::post('/limbola/admin/tag/edit/{id}', [
		'uses' => 'TagController@postEditedPost',
		'as'   => 'edited_tag',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

// Users
	Route::get('/limbola/admin/users', [
		'uses' => 'UserController@getUsers',
		'as'   => 'view_users',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::post('/limbola/admin/users', [
		'uses' => 'UserController@postUser',
		'as'   => 'users',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::get('/limbola/admin/user/edit/role/{id}', [
		'uses' => 'UserController@getUserRole',
		'as'   => 'edit_user_role',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);

	Route::post('/limbola/admin/user/edit/role/{id}', [
		'uses' => 'UserController@postUserRole',
		'as'   => 'post_edit_user_role',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> 'Administrateur'
	]);


	// User Profile
	Route::get('/limbola/admin/profile/{id}', [
	  'uses'  => 'UserController@getUserProfile',
	  'as'    => 'profile',
	  'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::post('/limbola/admin/profile', [
	  'uses'  => 'UserController@postUserProfile',
	  'as'    => 'profile_update',
	  'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	// Upload user image
	Route::post('/limbola/admin/password', [
	  'uses'  => 'UserController@upload_avatar',
	  'as'    => 'upload_profile',
	  'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	Route::get('/limbola/admin/user/delete/{id}', [
		'uses' => 'UserController@deleteUser',
		'as'   => 'delete_User',
	    'middleware' => 'auth',
	    'middleware' => 'roles',
	    'roles'	=> ['Administrateur', 'Redacteur']
	]);

	// Sign in
	Route::get('/limbola/admin/login', [
	  'uses'  => 'UserController@getSignin',
	  'as'    => 'login'
	])->name('login');

	Route::post('/limbola/admin/login', [
	  'uses'  => 'UserController@postSignin',
	  'as'    => 'login'
	]);

	// Sing out
	Route::get('/limbola/admin/logout', [
	  'uses'  => 'UserController@getSignout',
	  'as'    => 'logout'
	]);


	// Reset password
	Route::post('/profile/motdepasse/reinitialisation', [
	  'uses'  => 'UserController@getChangePassword',
	  'as'    => 'open_reset_password',
		'middleware' => 'guest',
	]);


	Route::get('/profile/reinitialisation', [
	  'uses'  => 'UserController@getPasswordReset',
	  'as'    => 'password_reset',
		'middleware' => 'guest',
	]);

	Route::post('/profile/password/reinitialisation', [
	  'uses'  => 'UserController@postPasswordReset',
	  'as'    => 'post_password_reset',
		'middleware' => 'guest',
	]);
