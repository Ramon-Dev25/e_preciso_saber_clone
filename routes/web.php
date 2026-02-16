<?php

use App\Http\Controllers\Adm\ContactsController;
use App\Http\Controllers\Adm\ControlPanelController;
use App\Http\Controllers\Adm\EventsController;
use App\Http\Controllers\Adm\KitsController;
use App\Http\Controllers\Adm\ProductController;
use App\Http\Controllers\PublicKitController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvaController;

// ------------------------------ WEB ------------------------------

Route::get('/', [WebController::class, 'index'])->name('web.index');

Route::get('/produtos/projetos', [WebController::class, 'productsProjects'])->name('web.productsProjects');

Route::post('/enviar/formulario', [WebController::class, 'formContact'])->name('web.formContact');
Route::post('/enviar/formulario/ava', [WebController::class, 'formContactAva'])->name('web.formContactAva');

Route::get('/ava', [WebController::class, 'ava'])->name('web.ava');
Route::get('/biblioteca-certa', [WebController::class, 'bibliotecaCertaIndex'])->name('web.bibliotecaCertaIndex');

Route::get('/eventos/todos', [WebController::class, 'eventsAll'])->name('web.eventsAll');

Route::get('/eventos/detalhes/{event}', [WebController::class, 'eventsManager'])->name('web.eventsManager');

Route::get('/visualizar/produto/{id}', [WebController::class, 'viewProduct'])->name('web.viewProduct');

// ------------------------------ FIM WEB ------------------------------

// ------------------------------ LOGIN ------------------------------

Route::prefix('usuario')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::post('/login', [UserController::class, 'login'])->name('user.login');

    Route::get('/login', [UserController::class, 'index'])->name('login'); 
});

Route::middleware(['auth'])->group(function () {
    // ------------------------------ PAINEL DE CONTROLE ------------------------------
    Route::prefix('adm')->group(function () {
        Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    
        Route::get('/criar/novo', [UserController::class, 'register'])->name('user.register');
    
        Route::post('/cadastrando', [UserController::class, 'createUser'])->name('user.createUser');
    
        Route::post('/user/theme', [UserController::class, 'updateTheme'])->name('user.theme');
    
        Route::get('/usuarios', [UserController::class, 'users'])->name('user.users');
    
        Route::post('/editar', [UserController::class, 'editUser'])->name('user.editUser');
    
        Route::get('/visualizar/{id}', [UserController::class, 'viewUser'])->name('user.viewUser');
    
        Route::get('/listar', [UserController::class, 'listUsers'])->name('user.listUsers');
    
        Route::delete('/deletar/{user}', [UserController::class, 'deleteUser'])->name('user.deleteUser');
    });
    
    Route::prefix('painel')->group(function () {
    
        Route::get('/', [ControlPanelController::class, 'index'])->name('controlPanel.index');
    
        // CONTATOS
        Route::prefix('contatos')->group(function () {
    
            Route::get('/listar/eprecisosaber', [ContactsController::class, 'listContactEPrecisoSaber'])->name('controlPanel.listContactEPrecisoSaber');
    
            Route::get('/listar/ava', [ContactsController::class, 'listContactAva'])->name('controlPanel.listContactAva');
    
            Route::get('/visualizar/{id}', [ContactsController::class, 'viewContact'])->name('controlPanel.viewContact')->middleware('auth');
    
            Route::delete('/deletar/{id}', [ContactsController::class, 'deleteContact'])->name('controlPanel.deleteContact')->middleware('auth');
        });
    
        // PRODUTOS
        Route::prefix('produtos')->group(function () {
    
            Route::get('/', [ProductController::class, 'index'])->name('adm.product.index');
    
            Route::get('/cadastro', [ProductController::class, 'productRegistration'])->name('adm.product.productRegistration');
    
            Route::get('/listar', [ProductController::class, 'listProducts'])->name('adm.product.listProducts');
    
            Route::post('/cadastrando', [ProductController::class, 'registeringProduct'])->name('adm.product.registeringProduct');
    
            Route::get('/visualizar/{product}', [ProductController::class, 'viewProduct'])->name('adm.product.viewProduct');
    
            Route::post('/editar', [ProductController::class, 'editProduct'])->name('adm.product.editProduct');
    
            Route::delete('/deletar/{id}', [ProductController::class, 'deleteProduct'])->name('adm.product.deleteProduct');
        });
    
        //KITS
        Route::prefix('kits')->group(function () {
    
            Route::get('/', [KitsController::class, 'index'])->name('adm.kits.index');
    
            Route::post('/cadastrando', [KitsController::class, 'registeringKits'])->name('adm.kits.registeringKits');
    
            Route::get('/listar', [KitsController::class, 'listKits'])->name('adm.kits.listKits');
    
            Route::get('/adicionar/itens/{kit}', [KitsController::class, 'addProducts'])->name('adm.kits.addProducts');
    
            Route::post('/adicionando/itens', [KitsController::class, 'addingProducts'])->name('adm.kits.addingProducts');
    
            Route::get('/listar/itens/{id}', [KitsController::class, 'listProductsKit'])->name('adm.kits.listProductsKit');
    
            Route::delete('/deletar/item/{id}', [KitsController::class, 'deleteProductKit'])->name('adm.kits.deleteProductKit')->middleware('auth');
    
            Route::delete('/deletar/{id}', [KitsController::class, 'deleteKit'])->name('adm.kits.deleteKit')->middleware('auth');
    
        });
    
        //Eventos
        Route::prefix('eventos')->group(function () {
            Route::get('/', [EventsController::class, 'index'])->name('adm.events.index');
    
            Route::get('/cadastro', [EventsController::class, 'eventsRegistration'])->name('adm.events.eventsRegistration');
    
            Route::post('/cadastrando', [EventsController::class, 'registeringEvents'])->name('adm.events.registeringEvents');
    
            Route::get('/listar', [EventsController::class, 'listEvents'])->name('adm.events.listEvents');
    
            Route::delete('/deletar/{id}', [EventsController::class, 'deleteEvents'])->name('adm.events.deleteEvents');
        });
    });
    // ------------------------------ FIM PAINEL DE CONTROLE ------------------------------

});

