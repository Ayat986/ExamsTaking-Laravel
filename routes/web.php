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

Route::view('/', 'welcome');
    Auth::routes();

    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/login/professor', 'Auth\LoginController@showProfessorLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
    Route::get('/register/professor', 'Auth\RegisterController@showProfessorRegisterForm');

    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/login/professor', 'Auth\LoginController@professorLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    Route::post('/register/professor', 'Auth\RegisterController@createProfessor');

    Route::get('/espacea',function(){
        return view('espacea');
    })->name('espacea');

    Route::get('/espaceb',function(){
        return view('espaceb');
    })->name('espaceb');

    Route::get('/espacec',function(){
        return view('espacec');
    })->name('espacec');

    Route::get('/home', 'HomeController@index')->middleware('auth');
    Route::view('/admin', 'admin')->middleware('auth:admin');
    Route::view('/professor', 'professor');//->middleware('auth:professor');


    Route::resource('/professors','ProfessorsController');

    Route::resource('/users','UserController');

    Route::get('/examens/create','ExamenController@create');
    Route::post('/examens','ExamenController@store');
    Route::get('/examens/{examen}','ExamenController@show');
    
    Route::get('/examens/{examen}/questions/create','QuestionController@create');
    Route::post('/examens/{examen}/questions','QuestionController@store');

    Route::get('/examens/{examen}/questions/create2','QuestionController@create2');
    Route::post('/examens/{examen}/questions2','QuestionController@store2');

    Route::get('/examen_passer/{examen}-{slug}','Examen_passerController@show');
    Route::post('/examen_passer/{examen}-{slug}','Examen_passerController@store');

    Route::get('/examens_prof','ExamenController@showtoprof');


    Route::delete('/examens/{examen}','ExamenController@destroy');

    Route::get('/examens_prof_corriger','ExamenController@corriger');

    Route::get('/examen_passer_etudiant/{examen_passer_id}','Examen_passerController@corriger');

    Route::post('/examen_passer_corriger/{examen_passer_id}','Examen_passerController@noter');
