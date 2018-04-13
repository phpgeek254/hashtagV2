<?php
use App\Event;
use App\Gallery;
use App\Post;
use App\User;
use App\Magazine;
Route::get('/', function () {
    $events = Event::with('event_images')->whereDate('start_date', '>=', date('Y-m-d'))->orderBy('start_date', 'ASC')->get();
    $posts = Post::with('images')->orderBy('id', 'DESC')->get();
    $gallery = Gallery::with('images')->orderByDesc('id')->first();
    $photography = Gallery::where('id', 11)->with('images')->first();
    $magazine = Magazine::with('pages')->orderByDesc('id')->get();

    return view('welcome', compact('events', 'posts', 'gallery', 'photography', 'magazine'));
});
Route::get('/about', function(){
    return view('about');
});

Route::get('profile', function(){
    if(Auth::check()){
        $user = User::findOrFail(Auth::user()->id);
        return view('auth.profile', compact('user'));
    } else {
        return redirect()->back()->with(['message', 'Authentication required']);
    }
});
Route::get('/contact', function (){
    return view('contact');
});
Route::resource('events', 'EventsController');

Route::resource('posts', 'PostController');

Route::resource('gallerys', 'GalleryController');

Route::resource('magazine', 'MagazineController');

Route::resource('comments', 'CommentsController');

Route::resource('postimage', 'PostImageController');

Route::resource('/image', 'ImageController');

Route::resource('/event_image', 'EventImageController');

Route::resource('/magazine_page', 'MagazinePageController');

Route::resource('story', 'MyStoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('test', function (){
   if( Auth::user() and Auth::user()->isAdmin){
       echo 'yes';
   } else {
       echo 'no';
       dd(Auth::user());
   }
});