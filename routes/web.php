<?php

use App\Http\Controllers\backend\Home as BackHome;
use App\Http\Controllers\backend\KategoriMenu;
use App\Http\Controllers\backend\Login;
use App\Http\Controllers\backend\Pages;
use App\Http\Controllers\backend\Post;
use App\Http\Controllers\backend\SettingFront;
use App\Http\Controllers\backend\SettingWebsite;
use App\Http\Controllers\front\Home as FrontHome;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontHome::class, 'index'])->name('FrontHome.index');

Route::get('/ti-admin/login', [Login::class, 'login'])->name('login');
Route::post('/ti-admin/authlogin', [Login::class, 'authlogin'])->name('ceklogin');
Route::get('/ti-admin/authlogout', [Login::class, 'authlogout'])->name('auth.logout');

Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access|anggota.access'], 'prefix' => '/ti-auth'], function () {
    Route::get('/dashboard', [BackHome::class, 'index'])->name('backhome.index');

    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/kategori-menu'], function () {
        Route::get('/home', [KategoriMenu::class, 'index'])->name('kategorimenu.index');
        Route::put('/{id}/{type}/{slug}/updatetype', [KategoriMenu::class, 'updatetype'])->name('kategorimenu.updatetype');
        Route::put('/{id}/{menustatus}/{slug}/updatestatus', [KategoriMenu::class, 'updatestatus'])->name('kategorimenu.updatestatus');
        Route::get('/{slug}/edit', [KategoriMenu::class, 'edit'])->name('kategorimenu.editmenu');
        Route::delete('/{id}', [KategoriMenu::class, 'destroy'])->name('delMenu');
        Route::get('/Add', [KategoriMenu::class, 'add'])->name('kategorimenu.add');
        Route::get('/checkSlug', [KategoriMenu::class, 'checkSlug'])->name('kategorimenu.checkSlug');
        Route::post('/Add', [KategoriMenu::class, 'store'])->name('kategorimenu.store');
        Route::post('/AddChild', [KategoriMenu::class, 'storechild'])->name('kategorimenu.storechild');
        Route::put('/{id}/{slug}', [KategoriMenu::class, 'update'])->name('kategorimenu.update');
    });
    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/setting-website'], function () {
        Route::get('/home', [SettingWebsite::class, 'index'])->name('settingswebsite.index');
        Route::put('/update', [SettingWebsite::class, 'update'])->name('settingswebsite.update');
        Route::put('/updatedefault', [SettingWebsite::class, 'updatedefault'])->name('settingswebsite.updatedefault');
    });
    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/setting-front'], function () {
        Route::get('/home', [SettingFront::class, 'index'])->name('settingsfront.index');
        Route::put('/update', [SettingFront::class, 'update'])->name('settingsfront.update');
        Route::put('/updatedefault', [SettingFront::class, 'updatedefault'])->name('settingsfront.updatedefault');
    });

    Route::group(['middleware' => ['auth','permission:alldashboard.access|admindashboard.access'], 'prefix' => '/pages'], function () {
        Route::post('/upload', [Pages::class, 'upload'])->name('ckeditor.image-upload');
        Route::get('/checkSlug', [Pages::class, 'checkSlug'])->name('pages.checkSlug');
        Route::get('/home', [Pages::class, 'index'])->name('pages.index');
        Route::get('/add', [Pages::class, 'add'])->name('pages.add');
        Route::post('/store', [Pages::class, 'store'])->name('pages.store');
        Route::get('/{id}/{pages_slug}/edit', [Pages::class, 'edit'])->name('pages.edit');
        Route::put('/{id}/{pages_slug}', [Pages::class, 'update'])->name('pages.update');
        Route::put('/{id}/{pages_slug}/updatestat', [Pages::class, 'updatestat'])->name('pages.updatestat');
        Route::put('/{id}/{pages_slug}/updateprotect', [Pages::class, 'updateprotect'])->name('pages.updateprotect');
        Route::delete('/{id}/{pages_slug}', [Pages::class, 'destroy'])->name('pages.destroy');
    });

    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/posting'], function () {
        Route::get('/checkSlug', [Post::class, 'checkSlug'])->name('posting.checkSlug');
        Route::get('/home', [Post::class, 'index'])->name('posting.index');
        Route::get('/add', [Post::class, 'add'])->name('posting.add');
        Route::post('/store', [Post::class, 'store'])->name('posting.store');
        Route::get('/{id}/{post_slug}/edit', [Post::class, 'edit'])->name('posting.edit');
        Route::put('/{id}/{post_slug}', [Post::class, 'update'])->name('posting.update');
        Route::put('/{id}/{post_slug}/updatestat', [Post::class, 'updatestat'])->name('posting.updatestat');
        Route::delete('/{id}/{post_slug}', [Post::class, 'destroy'])->name('posting.destroy');
    });

});