<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Single posts routes */
Route::get('/blogs/amazing-facts-that-you-probably-didnt-know-about-sindhudurg',function(){
	return view('blogs.amazing-facts-that-you-probably-didnt-know-about-sindhudurg');
});
route::get('/blogs/amazing-facts-that-you-probably-didnt-know-about-sindhudurg', [PagesController::class, 'blogs1']);


Route::get('/news/axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport-devdiscourse',function(){
	return view('news.axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport-devdiscourse');
});
route::get('/news/axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport-devdiscourse', [PagesController::class, 'news1']);

Route::get('/news/axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport',function(){
	return view('news.axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport');
});
route::get('/news/axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport', [PagesController::class, 'news2']);

/*Single posts routes */



Route::get('/', function () {
    return view('index');
});
/* About us */
Route::get('/about-us',function(){
	return view('aboutus.about');
});

Route::get('/our-team',function(){
	return view('aboutus.team');
});
Route::get('/our-vision',function(){
	return view('aboutus.vision');
});
Route::get('/corporate-philosophy',function(){
	return view('aboutus.corporate');
});



/* Projects */
Route::get('/axisblues',function(){
	return view('projects.axisblues');
});
Route::get('/villas-in-goa',function(){
	return view('projects.yogvillas');
});
Route::get('/lakecity',function(){
	return view('projects.lakecity');
});
Route::get('/kncz',function(){
	return view('projects.kncj');
});
Route::get('/lakecityplaza',function(){
	return view('projects.lakecityplaza');
});
/* Contact */
Route::get('/contact',function(){
	return view('contactus.contactus');
});
/* blogs */

Route::get('/blogs',function(){
	return view('blogs.blog');
});



Route::get('/load-more-blogs', 'BlogController@loadMoreBlogs');

/* News */
Route::get('/news',function(){
	return view('news.news');
});

/* Himanshu News Code */
Route::get('/news/sample-news-article',function(){
	return view('news.sample-news-article');
});

// Fallback route for 404 errors
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

/* footer links */
Route::get('/career',function(){
	return view('footer-links.career');
});

Route::get('/disclaimer',function(){
	return view('footer-links.disclaimer');
});

Route::get('/privacy-policy',function(){
	return view('footer-links.privacy-policy');
});

Route::get('/terms-and-condition',function(){
	return view('footer-links.terms-and-condition');
});
Route::get('/channel-partner-register',function(){
	return view('channelpartner.register_page');
});

Route::get('/blogs/{slug?}',function(){
	return view('pagination/fetch_data');
});




//new routes




Route::get('/industries',function(){
	return view('frontend.industries');
});
Route::get('/inthenews',function(){
	return view('frontend.inthenews');
});
Route::get('/faq',function(){
	return view('frontend.faq');
});
Route::get('/our_work',function(){
	return view('frontend.our_work');
});

Route::get('/sitemap',function(){
	return view('frontend.sitemap');
});



Route::get('/dev', 'FrontendController@dev'); 


Route::get('/kycmessagepage/{slug?}',function($slug=""){
	return view('kycmessagepage')->with(['slug'=>$slug]);
});





// routes/web.php
use App\Http\Controllers\ContactController;

Route::post('/send-contact', [ContactController::class, 'send'])->name('send.contact');

route::get('/blogs', [PagesController::class, 'blogss']);
Route::get('/blogs/{title}', 'EdificController@showblog')->name('blogs.show');//single blog view

route::get('/news', [PagesController::class, 'newss']);
Route::get('/news/{title}', 'EdificController@shownews')->name('news.show');//single blog view



