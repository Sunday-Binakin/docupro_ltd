<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\HomePage\SliderController;
use App\Http\Controllers\HomePage\ChoseUsController;
use App\Http\Controllers\HomePage\ServiceController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\HomePage\HomePageController;
use App\Http\Controllers\HomePage\callExpertController;
use App\Http\Controllers\HomePage\OurExpertsController;

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

    //Home Slider All Route
    // Route::controller(HomeSliderController::class)->group(function () {
    //     Route::get('/home/slider', 'HomeSlider')->name('home.slider');
    //     Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    // });


    //Admin Home Page routes
    Route::prefix('admin/call')->controller(callExpertController::class)->group(function () {
        Route::get('/expert/all', 'callExpert')->name('all.call.experts');
        Route::get('/experts', 'addCallExperts')->name('add.call.experts');
        Route::post('/experts', 'storeCallExperts')->name('store.call.experts');
        Route::get('/edit/experts/{id}', 'editCallExperts')->name('edit.call.experts');
        Route::get('/delete/experts/{id}', 'deleteCallExperts')->name('delete.call.experts');
        Route::post('/experts/update/', 'updateCallExperts')->name('update.call.experts');
    });
//home page slider
    Route::prefix('slider')->controller(SliderController::class)->group(function () {
        Route::get('/all', 'allSliders')->name('all.sliders');
        Route::get('/add', 'addSliders')->name('add.slider');
        Route::post('/add/image', 'storeSlider')->name('store.image');
        Route::get('/delete/{id}','deleteSlider')->name('delete.slider');
        Route::get('/edit/{id}','editSlider')->name('edit.slider');
        Route::post('/update','updateSlider')->name('update.slider');

    });

    //homepage service
    Route::prefix('service')->controller(ServiceController::class)->group(function () {
        Route::get('/all', 'allServices')->name('all.services');
        Route::get('/add', 'addService')->name('add.service');
        Route::post('/store', 'storeService')->name('store.service');
        Route::get('/delete/{id}', 'deleteService')->name('delete.service');
        Route::get('/edit/{id}', 'editService')->name('edit.service');
        Route::post('/update', 'updateService')->name('update.service');
    });

    Route::prefix('why/chose/us')->controller(ChoseUsController::class)->group(function () {
        Route::get('/all', 'allWhyChoseUs')->name('all.why.chose.us');
        Route::get('/add', 'addWhyChoseUs')->name('add.why.chose.us');
        Route::post('/store', 'storeWhyChoseUs')->name('store.why.chose.us');
        Route::post('/update', 'updateWhyChoseUs')->name('update.why.chose.us');
        Route::get('/edit/{id}', 'editWhyChoseUs')->name('edit.why.chose.us');
        Route::get('/delete/{id}', 'deleteWhyChoseUs')->name('delete.why.chose.us');
    });


    Route::prefix('our/experts')->controller(OurExpertsController::class)->group(function () {
        Route::get('/all', 'allOurExperts')->name('all.our.experts');
        Route::get('/add', 'addOurExperts')->name('add.our.experts');
        Route::post('/store', 'storeOurExperts')->name('store.our.experts');
        Route::post('/update', 'updateOurExperts')->name('update.our.experts');
        Route::get('/edit/{id}', 'editOurExperts')->name('edit.our.experts');
        Route::get('/delete/{id}', 'deleteOurExperts')->name('delete.our.experts');
    });
});
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
