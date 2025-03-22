<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rodinCommerce', function(){
    return view('rodin-home-page');
});

Route::any('/any', function(){
    return "Permite todo o tipo de acesso http";
});

Route::match(['get', 'post'], "/match", function(){
    return "permite apenas acessos definidos";
});

//passagem de paramentros pela url
Route::get('/produto/{id}', function($id){
    return "O id do produto é: " . $id;
});

Route::redirect('/sobre', '/rodinCommerce');
Route::view('/empresa', 'rodin-home-page');


//rotas nomeadas

Route::get('news', function(){
    return view('news');
})->name('noticias');

Route::get('novidades', function(){
    return redirect()->route('noticias');
});

//agrupando rotaas


Route::prefix('admin')->group(function(){
    Route::get('dashboard', function(){
        return "dashboard dos admin";
    });

    Route::get('users', function(){
        return "Users";
    });

    Route::get('painel', function(){
        return "painel dos admin";
    });
});

Route::group([
    'prefix'=>'client',
    'as' => 'client.'
], function(){
    Route::get('dashboard', function(){
        return "client dashboard";
    });
    Route::get('home_page', function(){
        return "client home page";
    });
    Route::get('loja', function(){
        return "client loja";
    });
});