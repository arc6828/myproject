<?php

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

Route::get('/', function () {
    //ไปเรียกไฟล์ resource/views/welcome.blade.php ขึ้นมาแสดง
    return view('welcome');
});

Route::get('/table', function () {
    return view('table');
});

//EP.2
Route::get("/home", function() {
    return "<h1>This is home page</h1>" ;
});

//สังเกตคำว่า {id} หมายถึง ตัวแปร
Route::get("/blog/{id}", function($id) {
    return "<h1>This is blog page : {$id} </h1>" ;
});

Route::get( "/blog/{id}/edit" , function($id) {
    return "<h1>This is blog page : {$id} for edit</h1>" ;
});

Route::get("/product/{a}/{b}/{c}", function($a, $b, $c) {
    return "<h1>This is product page </h1><div>{$a} , {$b}, {$c}</div>" ;
});

//DEFAULT
Route::get("/category/{a?}", function($a = "mobile") {
    return "<h1>This is category page : {$a} </h1>" ;
});


Route::get("/order/create", function() {
    return "<h1>This is order form ". request("id")." page : ". request("username") ."</h1>" ;

});

Route::get("/hello", function() {	
    return view('hello');
});

Route::get('/greeting', function () {

    $name = 'James';
    $last_name = 'Mars';

    return view('greeting', compact('name','last_name') );
});

Route::get( "/gallery" , function(){
	$ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2019/04/captain_america-civil_war-anthony_mackie-photofest-h_2019.jpg";
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    $god = "https://amp.insider.com/images/5b7acee73cccd122008b45ac-750-563.jpg";
    $spider = "https://cdn1us.denofgeek.com/sites/denofgeekus/files/styles/main_wide/public/2019/03/spider-man-far-from-home-tom-holland.jpg";

    return view("test/index", compact("ant","bird","cat","god","spider") );
});

Route::get( "/gallery/ant" , function(){
	$ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";    
    return view("test/ant", compact("ant") );
});
Route::get( "/gallery/bird" , function(){
	$bird = "https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2019/04/captain_america-civil_war-anthony_mackie-photofest-h_2019.jpg";    
    return view("test/bird", compact("bird") );
});
Route::get( "/gallery/cat" , function(){
	$cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";    
    return view("test/cat", compact("cat") );
});

//EP.3
Route::get("/myprofile/create","MyProfileController@create");
Route::get("/myprofile/{id}/edit", "MyProfileController@edit");
Route::get("/myprofile/{id}", "MyProfileController@show");

Route::get( "/newgallery" , "MyProfileController@gallery" );
Route::get( "/newgallery/ant" , "MyProfileController@ant" );
Route::get( "/newgallery/bird" , "MyProfileController@bird" );

//EP.4
Route::get( "/coronavirus" , "MyProfileController@coronavirus" );
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('covid19', 'Covid19Controller');
/*
Route::middleware(['auth','role:admin,teacher'])->group(function () {    
    Route::resource('covid19', 'Covid19Controller')->only(['index', 'show' ]);
});
Route::middleware(['auth','role:admin'])->group(function () {    
    Route::resource('covid19', 'Covid19Controller')->except(['index', 'show' ]);
});
*/
Route::get("/teacher" , function (){
    return view("teacher/index");
});


Route::get("/student" , function (){
	return view("student/index");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//EP6

/*
Route::get('/covid19', 'Covid19Controller@index');
Route::get("/covid19/create", "Covid19Controller@create");
Route::post("/covid19", "Covid19Controller@store");
Route::get('/covid19/{id}', 'Covid19Controller@show');
Route::get("/covid19/{id}/edit", "Covid19Controller@edit");
Route::patch("/covid19/{id}", "Covid19Controller@update");
Route::delete("/covid19/{id}", "Covid19Controller@destroy");
*/


Route::get('/vehicle/pdf', 'VehicleController@pdf_index');

Route::resource('post', 'PostController');
Route::resource('staff', 'StaffController');
Route::resource('vehicle', 'VehicleController');
Route::resource('profile', 'ProfileController');
Route::resource('user', 'UserController');

Route::resource('book', 'BookController');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {    
        Route::get('order-product/reportdaily', 'OrderProductController@reportdaily');
        Route::get('order-product/reportmonthly', 'OrderProductController@reportmonthly');
        Route::get('order-product/reportyearly', 'OrderProductController@reportyearly');
    });
    
    Route::resource('order-product', 'OrderProductController');
    Route::resource('order', 'OrderController');
    Route::resource('payment', 'PaymentController');
    
});

Route::resource('product', 'ProductController');