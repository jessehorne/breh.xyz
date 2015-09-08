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

Route::get('/s/{id}', function($id) {
  $url = DB::table('urls')->where('short_url', '=', $id)->first();

  if ($url === null) {
    return redirect('/');
  } else {
    $stat = App\Stat::first();
    $stat->link_uses += 1;
    $stat->save();
    return redirect($url->long_url);
  }
});

Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/logout', 'AdminController@logout');

Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@dashboard');

Route::post('/create', 'SiteController@create');
Route::resource('', 'SiteController');
