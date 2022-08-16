<?php

use App\Http\Controllers\About\AboutCompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Home\SliderController;
use App\Http\Controllers\Home\WhyChoseUsController;


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

Route::get('/', function () {
    return view('website.home_page');
})->name('home');

Route::prefix('about')->group(function () {
    Route::get('/us', function () {
        return view('website.about_us');
    })->name('about');
    Route::get('/mission', function () {
        return view('website.about_page.mission');
    })->name('mission');
    Route::get('/careers', function () {
        return view('website.about_page.careers');
    })->name('careers');
});
Route::prefix('service')->group(function () {
    Route::get('/dms', function () {
        return view('website.service_page.dms');
    })->name('dms');
    Route::get('/hdms', function () {
        return view('website.service_page.health_document_management_solution');
    })->name('hdms');
    Route::get('/eiams', function () {
        return view('website.service_page.enterprise_entity');
    })->name('eiams');
    Route::get('/document/warehousing', function () {
        return view('website.service_page.document_warehousing');
    })->name('document.warehousing');
    Route::get('/software/development', function () {
        return view('website.service_page.software_development');
    })->name('software.development');
});

Route::get('/media/room', function () {
    return view('website.media_room');
})->name('media');

Route::get('/contact/us', function () {
    return view('website.contact_page');
})->name('contact.us');

Route::middleware('auth')->group(function () {
    // search bar implementation
    Route::get('/search', SearchController::class);
    // creating a group route for all admin actions
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });

    //home Slider
    Route::prefix('slider')->controller(SliderController::class)->group(function () {
        Route::get('/index', 'index')->name('slider.index');
        Route::get('/create', 'create')->name('slider.create');
        Route::post('/store', 'store')->name('slider.store');
        Route::post('/show', 'show')->name('slider.show');
        Route::get('/edit/{id}', 'edit')->name('slider.edit');
        Route::post('/update', 'update')->name('slider.update');
        Route::get('/destroy/{id}', 'destroy')->name('slider.destroy');
    });

    //Home Why chose Us
    Route::prefix('why/chose/us')->controller(WhyChoseUsController::class)->group(function () {
        Route::get('/index', 'index')->name('why.chose.us.index');
        Route::get('/create', 'create')->name('why.chose.us.create');
        Route::post('/store', 'store')->name('why.chose.us.store');
        Route::get('/edit/{id}', 'edit')->name('why.chose.us.edit');
        Route::post('/update', 'update')->name('why.chose.us.update');
        Route::get('/destroy/{id}', 'destroy')->name('why.chose.us.destroy');
    });
    //About Company Routes
    Route::prefix('about/company')->controller(AboutCompanyController::class)->group(function () {
        Route::get('/index', 'index')->name('about.company.index');
        Route::get('/create', 'create')->name('about.company.create');
        Route::post('/store', 'store')->name('about.company.store');
        Route::get('/edit/{id}', 'edit')->name('about.company.edit');
            Route::post('/update/{id}', 'update')->name('about.company.update');
        Route::get('/destroy/{id}', 'destroy')->name('about.company.destroy');
    });
});
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
