<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile;
use App\Http\Controllers\About;
use App\Http\Middleware\customAuth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\ProfileUpdateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>'web'],function(){
    Route::get('/', function () { return view('landing'); });
    Route::get('/homepage','App\Http\Controllers\PostController@homepage');
    Route::post('get-post-list','App\Http\Controllers\PostController@postList');
    Route::post('get-comment-list','App\Http\Controllers\PostController@commentList');
    Route::get('profile', 'App\Http\Controllers\Profile@index');
    Route::get('see_friend/{id}', 'App\Http\Controllers\FriendsController@viewfriends');
    Route::get('add_friend/{id}', 'App\Http\Controllers\FriendsController@addFriend');
    Route::get('cancel_request/{id}', 'App\Http\Controllers\FriendsController@cancelRequest');
    Route::get('unfrind/{id}', 'App\Http\Controllers\FriendsController@unfrind');
    Route::get('confirm_request/{id}', 'App\Http\Controllers\FriendsController@confirmRequest');
    Route::get('profile', 'App\Http\Controllers\Profile@index');
    Route::post('profile_photo', 'App\Http\Controllers\AboutController@profile_photo');
    Route::post('cover_photo', 'App\Http\Controllers\AboutController@cover_photo');
    Route::get('about', 'App\Http\Controllers\AboutController@index');
    Route::get('timeline-friends', 'App\Http\Controllers\timelineController@index');
    Route::get('edit-profile-basic', 'App\Http\Controllers\ProfileUpdateController@editBasic');
   // Route::get('about', 'App\Http\Controllers\ProfileUpdateController@userInfo');
    Route::post('/edit-work-eductation','App\Http\Controllers\ProfileUpdateController@workEducationInfo');
    Route::post('profile_edit','App\Http\Controllers\ProfileUpdateController@profileEdit');
    Route::post('edit-interest','App\Http\Controllers\ProfileUpdateController@interestInfo');
    Route::post('accountInfo','App\Http\Controllers\ProfileUpdateController@accountInfo');
    Route::get('/delete-post/{id}','App\Http\Controllers\PostController@deletePost');
    Route::get('/edit-post/{id}','App\Http\Controllers\PostController@editPost');
    Route::post('like','App\Http\Controllers\PostController@likeDislikePost');
    Route::post('seen','App\Http\Controllers\PostController@seennotification');
    Route::get('/edit-account-setting','App\Http\Controllers\ProfileUpdateController@accountSetting');
});

Route::get('/add-students','App\Http\Controllers\UserWorkEducationController@index');


Route::get('/logout', function () {
    return view('logout');
});

Route::get('/404', function () {
    return view('404');
});
Route::get('/404-2', function () {
    return view('404-2');
});

Route::get('/about-company', function () {
    return view('about-company');
});
Route::get('/blog-detail', function () {
    return view('blog-detail');
});
Route::get('/blog-grid-wo-sidebar', function () {
    return view('blog-grid-wo-sidebar');
});
Route::get('/blog-grid-left-sidebar', function () {
    return view('blog-grid-left-sidebar');
});
Route::get('/blog-grid-right-sidebar', function () {
    return view('blog-grid-right-sidebar');
});
Route::get('/blog-list-left-sidebar', function () {
    return view('blog-list-left-sidebar');
});
Route::get('/blog-list-right-sidebar', function () {
    return view('blog-list-right-sidebar');
});
Route::get('/blog-list-wo-sidebar', function () {
    return view('blog-list-wo-sidebar');
});
Route::get('/blog-masonry', function () {
    return view('blog-masonry');
});
Route::get('/career-detail', function () {
    return view('career-detail');
});
Route::get('/careers', function () {
    return view('careers');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/contact-branches', function () {
    return view('contact-branches');
});
Route::get('/create-fav-page', function () {
    return view('create-fav-page');
});

Route::get('/edit-interest', function () {
    return view('edit-interest');
});
Route::get('/edit-password', function () {
    return view('edit-password');
});

Route::get('/edit-work-eductation', function () {
    return view('edit-work-eductation');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/fav-page', function () {
    return view('fav-page');
});
Route::get('/forum', function () {
    return view('forum');
});
Route::get('/forum-create-topic', function () {
    return view('forum-create-topic');
});
Route::get('/forum-open-topic', function () {
    return view('forum-open-topic');
});
Route::get('/forums-category', function () {
    return view('forums-category');
});
Route::get('/groups', function () {
    return view('groups');
});
Route::get('/inbox', function () {
    return view('inbox');
});
Route::get('/index-company', function () {
    return view('index-company');
});
Route::get('/index-with-seprate-files', function () {
    return view('index-with-seprate-files');
});
Route::get('/insights', function () {
    return view('insights');
});
Route::get('/knowledge-base', function () {
    return view('knowledge-base');
});
Route::get('/landing', function () {
    return view('landing');
});
Route::get('/messages', function () {
    return view('messages');
});
Route::get('/newsfeed', function () {
    return view('newsfeed');
});
Route::get('/notifications', function () {
    return view('notifications');
});
Route::get('/page-likers', function () {
    return view('page-likers');
});
Route::get('/people-nearby', function () {
    return view('people-nearby');
});
Route::get('/portfolio-2colm', function () {
    return view('portfolio-2colm');
});
Route::get('/portfolio-3colm', function () {
    return view('portfolio-3colm');
});
Route::get('/portfolio-4colm', function () {
    return view('careers');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/shop-cart', function () {
    return view('shop-cart');
});
Route::get('/shop-checkout', function () {
    return view('shop-checkout');
});
Route::get('/shop-masonry', function () {
    return view('shop-masonry');
});
Route::get('/shop-single', function () {
    return view('shop-single');
});
Route::get('/social-post-single', function () {
    return view('social-post-single');
});
Route::get('/support-and-help', function () {
    return view('support-and-help');
});
Route::get('/support-and-help-detail', function () {
    return view('support-and-help-detail');
});
Route::get('/support-and-help-search-result', function () {
    return view('support-and-help-search-result');
});
Route::get('/time-line', function () {
    return view('time-line');
});
// Route::get('/timeline-friends', function () {
//     return view('timeline-friends');
// });
Route::get('/timeline-groups', function () {
    return view('timeline-groups');
});
Route::get('/timeline-pages', function () {
    return view('timeline-pages');
});
Route::get('/timeline-photos', function () {
    return view('timeline-photos');
});
Route::get('/timeline-videos', function () {
    return view('timeline-videos');
});
Route::get('/widgets', function () {
    return view('widgets');
});


Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile', [Profile::class, 'index']);
Route::post('/upload-image', [Profile::class, 'store']);


