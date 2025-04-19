<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Storage;
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


Route::get('setlocale/{locale}', function ($lang) {
	\Session::put('locale', $lang);
	return redirect()->back();
})->name('setlocale');


// Frontend Routes
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.home');
Route::get('catalog/{slug}', [App\Http\Controllers\Frontend\HomeController::class, 'catalogDetail'])->name('frontend.catalog.detail');
Route::get('{filterBy}/{slug}', [App\Http\Controllers\Frontend\HomeController::class, 'filterCatalog'])->where('filterBy', 'tag|category')->name('frontend.filter');
Route::get('blog', [App\Http\Controllers\Frontend\HomeController::class, 'blog'])->name('frontend.blog');
Route::get('blog/{post:slug}', [App\Http\Controllers\Frontend\HomeController::class, 'blogDetails'])->name('frontend.blog.details');

Route::get('robots.txt', function() {
	$path = public_path('robots.txt');
    if (file_exists($path)) {
        return response()->file($path, [
            'Content-Type' => 'text/plain'
        ]);
    }
	    
    return response("User-agent: *\nDisallow:", 200, [
        'Content-Type' => 'text/plain'
    ]);
});

Route::get('sitemap.xml', function() {
    return response()->file(public_path('sitemap.xml'), [
        'Content-Type' => 'application/xml'
    ]);
})->name('frontend.sitemap');

Route::get('/media/{path}', function ($path) {
    $filePath = storage_path('app/public/' . $path);

    if (!file_exists($filePath)) {
        abort(404);
    }

    return Response::file($filePath);
})->where('path', '.*')->name('media.path');