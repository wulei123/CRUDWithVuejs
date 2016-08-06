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




Route::resource('/', 'UserController');




//API
/*Route::get('/api/users',function (){
    return App\User::all();
});
Route::post('/api/users',function (){
   return App\User::create(Request::all());
});
Route::get('/api/users/{id}',function ($id){
    return App\User::findOrFail($id);
});

Route::patch('/api/users/{id}',function ($id){
    App\User::findOrFail($id)->update(Request::all());
//    return Response::json(Request::all());
    return Request::all();
});
Route::delete('/api/users/{id}',function ($id){
    App\User::destroy($id);
});*/
Route::group(['prefix'=>'/api/users'],function (){
    Route::match(['GET','POST'],'/',function (){
        if(Request::isMethod('GET')){
            return App\User::all();
        }else{
            return App\User::create(Request::all());
        }
    });
    Route::match(['GET','PATCH','DELETE'],'/{id}',function ($id){
        if(Request::isMethod('GET')){
            return App\User::findOrFail($id);
        }else if(Request::isMethod('PATCH')){
            App\User::findOrFail($id)->update(Request::all());
            return Response::json(Request::all());
        }else{
            App\User::destroy($id);
        }
    });
});
