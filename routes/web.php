<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EvidenveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StandardPage;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\UserMainController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('main-page');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified','rolemanager:user'])->name('dashboard');


// User route
Route::middleware(['auth', 'verified', 'rolemanager:user'])->group(function(){
    Route::controller(UserMainController::class)->group(function(){
        Route::get('/dashboard', [EvidenveController::class, 'viewByUser'])->name(name: 'dashboard');
        Route::get('/create-new', 'createPage')->name('create');
        Route::get('/edit/{id}', 'editPage')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        // Route::post('/create', 'store')->name('store');
    });
    Route::controller(EvidenveController::class)->group(function(){
        Route::post('/create', 'storeByUser')->name('store');
        Route::post('/update/{id}', 'update')->name('update');
        //form
        Route::post('/create-form', 'store')->name('evidence.store');
        Route::delete('/evidence/{evidence}', 'destroy')->name('evidence.destroy');
        Route::put('/evidence/{evidence}', 'updateForm')->name('evidence.update');
    });
    Route::controller(StandardPage::class)->group(function(){
        Route::get ('/Aspek-1.1','Aspek_1_1')->name('aspek_1_1');
        Route::get ('/Aspek-1.2','Aspek_2_1')->name('aspek_2_1');
        Route::get ('/Aspek-1.3','Std_1_3')->name('aspek_3');
        // Route::get ('/Aspek-1.1','view_Page_1_1')->name('aspek_1_1');

    });

    Route::controller(TestController::class)->group(function(){
        Route::post('/create_form','testForm')->name('testForm');
    
    });
});


// Admin route
Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::controller(AdminMainController::class)->group(function(){
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::get('/view-users','viewAllUser')->name('admin.view.user');
            Route::get('/review/{id}','review')->name('review');
            Route::get('/register-user','registerUser')->name('register.user');
            Route::post('/register-user','storeByAdmin')->name('store.user');
            Route::get('/view-user-detail/{id}','viewUserDetail')->name('admin.view.user.detail');
        });
        Route::controller(EvidenveController::class)->group(function(){
            //code here
            Route::post('/review/{id}','reviewByAdmin')->name('review.admin');
        });
    
    });   
});

// User route
// Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {
//     Route::prefix('user')->group(function (){
//         Route::controller(UserMainController::class)->group(function(){
//             Route::get('/dashboard','index')->name('dashboard');
//         });
//      });   
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
