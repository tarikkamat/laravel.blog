<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin')->group(function () {

    /* Login Route */
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index']);
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'loginAction'])
        ->name('.login');
    /* Login Route */

    Route::middleware('auth')->group(function () {

        Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logoutAction'])
            ->name('.logout');

        Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
            ->name('.dashboard');

        /* Category Routes */
        Route::prefix('category')->name('.category')->group(function () {
            Route::get('/index', [\App\Http\Controllers\CategoryController::class, 'index'])
                ->name('.index');
            Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])
                ->name('.create');
            Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])
                ->name('.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])
                ->name('.edit');
            Route::post('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])
                ->name('.update');
            Route::get('/destroy/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])
                ->name('.destroy');
        });
        /* Category Routes */

        /* Article Routes */
        Route::prefix('article')->name('.article')->group(function () {
            Route::get('/index', [\App\Http\Controllers\ArticleController::class, 'index'])
                ->name('.index');
            Route::get('/create', [\App\Http\Controllers\ArticleController::class, 'create'])
                ->name('.create');
            Route::post('/create', [\App\Http\Controllers\ArticleController::class, 'store'])
                ->name('.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\ArticleController::class, 'edit'])
                ->name('.edit');
            Route::post('/edit/{id}', [\App\Http\Controllers\ArticleController::class, 'update'])
                ->name('.update');
            Route::get('/destroy/{id}', [\App\Http\Controllers\ArticleController::class, 'destroy'])
                ->name('.destroy');
        });
        /* Article Routes */

        /* Tag Routes */
        Route::prefix('tag')->name('.tag')->group(function () {
            Route::get('/index', [\App\Http\Controllers\TagController::class, 'index'])
                ->name('.index');
            Route::get('/create', [\App\Http\Controllers\TagController::class, 'create'])
                ->name('.create');
            Route::post('/create', [\App\Http\Controllers\TagController::class, 'store'])
                ->name('.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\TagController::class, 'edit'])
                ->name('.edit');
            Route::post('/edit/{id}', [\App\Http\Controllers\TagController::class, 'update'])
                ->name('.update');
            Route::get('/destroy/{id}', [\App\Http\Controllers\TagController::class, 'destroy'])
                ->name('.destroy');
        });
        /* Tag Routes */

        /* Comment Routes */
        Route::prefix('comment')->name('.comment')->group(function () {
            Route::get('/update/{id}', [\App\Http\Controllers\CommentController::class, 'statusChange'])->name('.update');
            Route::get('/destroy/{id}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('.destroy');
        });
        /* Comment Routes */


    });

});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/article/{slug}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');

/* Add comments */
Route::post('/comments/add', [\App\Http\Controllers\CommentController::class,'create'])->name('comments.create');

/* Static Routes */
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');
Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');
/* Static Routes */
