<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\About\TeamController;
use App\Http\Controllers\Home\SliderController;
use App\Http\Controllers\Home\WhyChoseUsController;

use App\Http\Controllers\Services\ServiceController;
use App\Http\Controllers\NewsMagazine\BlogController;
use App\Http\Controllers\About\AboutCompanyController;
use App\Http\Controllers\About\TestimonialsController;
use App\Http\Controllers\NewsMagazine\GalleryController;
use App\Http\Controllers\About\PurposeStatementController;
use App\Http\Controllers\ProductService\ProductController;
use App\Http\Controllers\ProductService\ProductCategoryController;

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
        Route::get('/create', 'create')->name('about.company.create');
        Route::post('/store', 'store')->name('about.company.store');
        Route::get('/show', 'show')->name('about.company.show');
        
    });

    //About/Team Routes
    Route::prefix('team')->controller(TeamController::class)->group(function () {
        Route::get('/index', 'index')->name('team.index');
        Route::get('/create', 'create')->name('team.create');
        Route::post('/store', 'store')->name('team.store');
        Route::get('/edit/{id}', 'edit')->name('team.edit');
        Route::post('/update/{id}', 'update')->name('team.update');
        Route::get('/destroy/{id}', 'destroy')->name('team.destroy');
    });

    //Purpose statement routes
    Route::prefix('purpose/statement')->controller(PurposeStatementController::class)->group(function () {
        Route::get('/create', 'create')->name('purpose.statement.create');
        Route::post('/store', 'store')->name('purpose.statement.store');
        Route::get('/show', 'show')->name('purpose.statement.show');
    });

    //Testimony Routes
    Route::prefix('testimony')->controller(TestimonialsController::class)->group(function () {
        Route::get('/index', 'index')->name('testimony.index');
        Route::get('/create', 'create')->name('testimony.create');
        Route::post('/store', 'store')->name('testimony.store');
        Route::get('/edit/{id}', 'edit')->name('testimony.edit');
        Route::post('/update/{id}', 'update')->name('testimony.update');
        Route::get('/destroy/{id}', 'destroy')->name('testimony.destroy');
    });

    Route::prefix('gallery')->controller(GalleryController::class)->group(function () {
        Route::get('/index', 'index')->name('gallery.index');
        Route::get('/create', 'create')->name('gallery.create');
        Route::post('/store', 'store')->name('gallery.store');
        Route::get('/edit/{id}', 'edit')->name('gallery.edit');
        Route::post('/update/{id}', 'update')->name('gallery.update');
        Route::get('/destroy/{id}', 'destroy')->name('gallery.destroy');
    });

    Route::prefix('blog')->controller(BlogController::class)->group(function () {
        Route::get('/index', 'index')->name('blog.index');
        Route::get('/create', 'create')->name('blog.create');
        Route::post('/store', 'store')->name('blog.store');
        Route::get('/edit/{id}', 'edit')->name('blog.edit');
        Route::post('/update/{id}', 'update')->name('blog.update');
        Route::get('/destroy/{id}', 'destroy')->name('blog.destroy');
    });

    Route::prefix('service')->controller(ServiceController::class)->group(function () {
        Route::get('/create', 'create')->name('service.create');
        Route::post('/store', 'store')->name('service.store');
        Route::get('/show', 'show')->name('service.show');
        
    });

    Route::prefix('product/category')->controller(ProductCategoryController::class)->group(function () {
        Route::get('/index', 'index')->name('product.category.index');
        Route::get('/create', 'create')->name('product.category.create');
        Route::post('/store', 'store')->name('product.category.store');
        Route::get('/edit/{id}', 'edit')->name('product.category.edit');
        Route::post('/update/{id}', 'update')->name('product.category.update');
        Route::get('/destroy/{id}', 'destroy')->name('product.category.destroy');
    });

    Route::prefix('product/')->controller(ProductController::class)->group(function () {
        Route::get('/index', 'index')->name('product.index');
        Route::get('/create', 'create')->name('product.create');
        Route::post('/store', 'store')->name('product.store');
        Route::get('/edit/{id}', 'edit')->name('product.edit');
        Route::post('/update/{id}', 'update')->name('product.update');
        Route::get('/destroy/{id}', 'destroy')->name('product.destroy');
    });
});
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
