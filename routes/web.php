<?php
use App\category;
use App\product;
use Illuminate\Http\Request;

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

Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogIn'],function(){
		Route::get('/','loginController@getLogin');
		Route::post('/','loginController@postLogin');
		});
	Route::get('logout','HomeController@getLogout');
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogOut'],function(){
        Route::get('home','HomeController@getHome');

        Route::group(['prefix'=>'category'],function(){
        	Route::get('/','CategoryController@getCat');
        	Route::post('/','CategoryController@postCat');

        	Route::get('edit/{id}','CategoryController@editCat');
        	Route::post('edit/{id}','CategoryController@postEditCat');

        	Route::get('delete/{id}','CategoryController@deleteCat');
        });

        Route::group(['prefix'=>'product'],function(){
                Route::get('/','ProductController@getPro');
                Route::get('add','ProductController@getAddPro');
                Route::post('add','ProductController@postAddPro');
                
                Route::get('see/{id}','ProductController@getSeePro');

                Route::get('edit/{id}','ProductController@getEditPro');
                Route::post('edit/{id}','ProductController@postEditPro');

                Route::post('delete/{id}','ProductController@deletePro');
        });
	});
});






// Route::get('pro','ProductController@ShowPro');