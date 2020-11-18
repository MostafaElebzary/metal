<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes([

    'register' => false,
    'verify' => false,
    'reset' => false
]);


Route::group(['middleware' => ['auth']], function () {
    //users
    Route::resource('users', 'admin\usersController');
    Route::get('users/{id}/delete', 'admin\usersController@destroy');


    //permission
    Route::resource('permission', 'admin\permissionController');

    // maindata
    Route::resource('maindata', 'websitePanel\MainDataController');
    //manager word
    Route::resource('managerword', 'websitePanel\ManagerWordController');
    //main service
    Route::resource('mainservices', 'websitePanel\MainServicesController');
    //slider
    Route::resource('slider', 'websitePanel\SliderController');
    Route::get('slider/{id}/delete', 'websitePanel\SliderController@destroy');
    //category
    Route::resource('category', 'websitePanel\CategoryController');
    Route::get('category/{id}/delete', 'websitePanel\CategoryController@destroy');
    //products
    Route::resource('works', 'websitePanel\ProductController');
    Route::get('works/{id}/delete', 'websitePanel\ProductController@destroy');
    //Services
    Route::resource('services', 'websitePanel\ServicesController');
    Route::get('services/{id}/delete', 'websitePanel\ServicesController@destroy');
    //latest news
    Route::resource('latestnews', 'websitePanel\LatestNews');
    Route::get('latestnews/{id}/delete', 'websitePanel\LatestNews@destroy');
    //parteners
    Route::resource('parteners', 'websitePanel\PartenersController');
    Route::get('parteners/{id}/delete', 'websitePanel\PartenersController@destroy');
    //whyus
    Route::resource('whyus', 'websitePanel\WhyUsController');
    //about
    Route::resource('about', 'websitePanel\AboutController');
    //points
    Route::get('points', 'websitePanel\AboutController@show');
    Route::get('points/{id}', 'websitePanel\AboutController@editpoints');
    Route::post('points/{id}', 'websitePanel\AboutController@updatepoints');
    //////////////////////////////
    //work images
    //id for work
    Route::get('workimages/{id}', 'websitePanel\ProductDetailsController@index');
    Route::get('workimages/create/{id}', 'websitePanel\ProductDetailsController@create');
    Route::post('workimages/{id}', 'websitePanel\ProductDetailsController@store');
    //this id for image
    Route::get('workimages/{id}/delete', 'websitePanel\ProductDetailsController@destroy');
    //////////////////////////
    //inbox
    Route::resource('inbox', 'inbox\inboxController');
    Route::get('inbox/{id}/delete', 'inbox\inboxController@destroy');
    Route::post('sendmessage', 'inbox\inboxController@sendmessage');
//send message from client archieve
    Route::get('client_data/{id}', 'inbox\inboxController@clientdata');
    Route::post('clientsendmessage', 'inbox\inboxController@clientsendmessage');


    //show message
    Route::get('messageList/{id}', 'inbox\inboxController@messageList');


    //map
    Route::resource('map', 'websitePanel\MapController');

//cpanel
//project type
    Route::resource('projecttypes', 'cpanel\ProjectTypeController');
    Route::get('projecttypes/{id}/delete', 'cpanel\ProjectTypeController@destroy');

//clients  and Operation on client archieve
    Route::resource('client', 'cpanel\ClientsController');
//client`s file this id refer to client_id
    Route::get('clientfiles/{id}', 'cpanel\FilesController@index');
    Route::get('clientfiles/{id}/delete', 'cpanel\FilesController@destroy');
    Route::get('clientfiles/create/{id}', 'cpanel\FilesController@create');
    Route::post('clientfiles/store', 'cpanel\FilesController@store');

//recipets
    Route::resource('recipts', 'cpanel\ReciptsController');
    Route::get('recipts/{id}/delete', 'cpanel\ReciptsController@destroy');
    Route::get('recipt/createout', 'cpanel\ReciptsController@createout');
    Route::post('recipt', 'cpanel\ReciptsController@search');

//account statements
    Route::resource('account', 'cpanel\AccountStatements');
    Route::get('AccountPrint/{id}', 'cpanel\AccountStatements@AccountPrint');
//user statistics
    Route::resource('userstatistics', 'cpanel\UsersStatisticsController');
//branches

    Route::resource('branch', 'cpanel\BranchController');
    Route::get('sendall', 'cpanel\BranchController@sendall');
    Route::post('sendall', 'cpanel\BranchController@send');
    Route::get('branch/{id}/delete', 'cpanel\BranchController@destroy');

//search client select in reciepts

    Route::get('select2-autocomplete-ajax', 'cpanel\ReciptsController@dataAjax');
    Route::get('clientdata/{id}', 'cpanel\ReciptsController@clientdata');
//transactions
    Route::resource('transactionstypes', 'cpanel\transactionsTypesController');
    Route::get('transactionstypes/{id}/delete', 'cpanel\transactionsTypesController@destroy');

    Route::resource('transactions', 'cpanel\transactionsController');
    Route::get('transactions/{id}/delete', 'cpanel\transactionsController@destroy');

    Route::get('importcreate', 'cpanel\transactionsController@importcreate');


    Route::post('search', 'cpanel\transactionsController@search');
    Route::get('attachment/{id}', 'cpanel\transactionsController@attachment');
    Route::post('addattachment', 'cpanel\transactionsController@addattachment');

    Route::get('attachment/{id}/delete', 'cpanel\transactionsController@delete');
    Route::get('barcode/{id}', 'cpanel\transactionsController@generateBarcode');

    Route::resource('thirdparty', 'cpanel\thirdPartyController');
    Route::get('thirdparty/{id}/delete', 'cpanel\thirdPartyController@destroy');


    //Main Client
    Route::resource('mainclient', 'cpanel\MainClientController');
    Route::get('mainclient/{id}/delete', 'cpanel\MainClientController@destroy');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('home', 'HomeController@index');


    Route::get('/logout', function () {

        return back();
    });
});


Route::get('lang/{lang}', function ($lang) {

    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'ar') {
        session()->put('lang', 'ar');
    } else {
        session()->put('lang', 'en');
    }

    return back();
});


Route::get('/', 'LandPage@index');
