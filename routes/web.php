<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::resource('clients', ClientController::class); //rotas resources

Route::get('/produtos', [ProdutoController::class, 'index'])->name("produto.index");

//passagem de paramentros pela url
Route::get('/produto/{id?}', [ProdutoController::class, 'show'])->name('produto.show');

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