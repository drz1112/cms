<?php

use App\Http\Controllers\backend\Clients;
use App\Http\Controllers\backend\Faq;
use App\Http\Controllers\backend\Galeri;
use App\Http\Controllers\backend\Home as BackHome;
use App\Http\Controllers\backend\KategoriMenu;
use App\Http\Controllers\backend\Login;
use App\Http\Controllers\backend\Pages;
use App\Http\Controllers\backend\Post;
use App\Http\Controllers\backend\ProfilSingkat;
use App\Http\Controllers\backend\SettingBannerFront;
use App\Http\Controllers\backend\SettingBoxs;
use App\Http\Controllers\backend\SettingFront;
use App\Http\Controllers\backend\SettingWebsite;
use App\Http\Controllers\backend\Team;
use App\Http\Controllers\front\Home as FrontHome;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontHome::class, 'index'])->name('FrontHome.index');
Route::get('/{post_slug}/posts', [FrontHome::class, 'detailposts'])->name('FrontHome.detailposts');

Route::get('/cms-ti/login', [Login::class, 'login'])->name('login');
Route::post('/cms-ti/authlogin', [Login::class, 'authlogin'])->name('ceklogin');
Route::get('/cms-ti/authlogout', [Login::class, 'authlogout'])->name('auth.logout');

Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access|anggota.access'], 'prefix' => '/cms-ti'], function () {
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
    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/setting-banner-front'], function () {
        Route::get('/home', [SettingBannerFront::class, 'index'])->name('settingsbannerfront.index');
        Route::put('/update', [SettingBannerFront::class, 'update'])->name('settingsbannerfront.update');
        Route::put('/updatedefault', [SettingBannerFront::class, 'updatedefault'])->name('settingsbannerfront.updatedefault');
    });
    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/setting-boxs'], function () {
        Route::get('/home', [SettingBoxs::class, 'index'])->name('settingboxs.index');
        Route::put('/update', [SettingBoxs::class, 'update'])->name('settingboxs.update');
        Route::put('/updatedefault', [SettingBoxs::class, 'updatedefault'])->name('settingboxs.updatedefault');
    });

    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/setting-clients'], function () {
        Route::get('/home', [Clients::class, 'index'])->name('settingclients.index');
        Route::get('/add', [Clients::class, 'add'])->name('settingclients.add');
        Route::post('/store', [Clients::class, 'store'])->name('settingclients.store');
        Route::get('/{id}/edit', [Clients::class, 'edit'])->name('settingclients.edit');
        Route::put('/{id}', [Clients::class, 'update'])->name('settingclients.update');
        Route::put('/{id}/updatestat', [Clients::class, 'updatestat'])->name('settingclients.updatestat');
        Route::delete('/{id}', [Clients::class, 'destroy'])->name('settingclients.destroy');
    });

    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/setting-profil-singkat'], function () {
        Route::get('/home', [ProfilSingkat::class, 'index'])->name('profilsingkat.index');
        Route::put('/update', [ProfilSingkat::class, 'update'])->name('profilsingkat.update');
    });

    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/setting-team'], function () {
        Route::get('/home', [Team::class, 'index'])->name('team.index');
        Route::get('/add', [Team::class, 'add'])->name('team.add');
        Route::post('/store', [Team::class, 'store'])->name('team.store');
        Route::get('/{id}/edit', [Team::class, 'edit'])->name('team.edit');
        Route::put('/{id}', [Team::class, 'update'])->name('team.update');
        Route::delete('/{id}', [Team::class, 'destroy'])->name('team.destroy');
    });

    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/setting-faq'], function () {
        Route::get('/home', [Faq::class, 'index'])->name('faq.index');
        Route::get('/add', [Faq::class, 'add'])->name('faq.add');
        Route::post('/store', [Faq::class, 'store'])->name('faq.store');
        Route::get('/{id}/edit', [Faq::class, 'edit'])->name('faq.edit');
        Route::put('/{id}', [Faq::class, 'update'])->name('faq.update');
        Route::put('/{id}/updatestat', [Faq::class, 'updatestat'])->name('faq.updatestat');
        Route::delete('/{id}', [Faq::class, 'destroy'])->name('faq.destroy');
    });

    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/pages'], function () {
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

    Route::group(['middleware' => ['auth', 'permission:alldashboard.access|admindashboard.access'], 'prefix' => '/galeri'], function () {
        Route::get('/home', [Galeri::class, 'index'])->name('galeri.index');
        Route::get('/add', [Galeri::class, 'add'])->name('galeri.add');
        Route::post('/store', [Galeri::class, 'store'])->name('galeri.store');
        Route::get('/{id}/edit', [Galeri::class, 'edit'])->name('galeri.edit');
        Route::put('/{id}', [Galeri::class, 'update'])->name('galeri.update');
        Route::put('/{id}/updatestat', [Galeri::class, 'updatestat'])->name('galeri.updatestat');
        Route::delete('/{id}', [Galeri::class, 'destroy'])->name('galeri.destroy');
    });
});
