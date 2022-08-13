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
use App\Http\Controllers\HomePage\ServiceController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\HomePage\HomePageController;
use App\Http\Controllers\HomePage\callExpertController;

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
    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('/home/slider', 'HomeSlider')->name('home.slider');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    });


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


    //About Page All route
    // Route::controller(AboutController::class)->group(function () {
    //     Route::get('/about/page', 'AboutPage')->name('about.page');
    //     Route::post('/update/about', 'UpdateAbout')->name('update.about');
    //     Route::get('/about', 'HomeAbout')->name('home.about');
    //     Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    //     Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    //     Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    //     Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    //     Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
    //     Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
    // });

    //All Portfolio Setup
    // Route::controller(PortfolioController::class)->group(function () {
    //     Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
    //     Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    //     Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');
    //     Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    //     Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    //     Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    //     Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
    //     Route::get('/home/portfolio', 'HomePortfolio')->name('home.portfolio');
    // });

    //Blog Category All Route
    // Route::controller(BlogCategoryController::class)->group(function () {
    //     Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
    //     Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
    //     Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    //     Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    //     Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
    //     Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
    // });

    // //All Blog Route
    // Route::controller(BlogController::class)->group(function () {
    //     Route::get('/all/blog', 'AllBlog')->name('all.blog');
    //     Route::get('/add/blog', 'AddBlog')->name('add.blog');
    //     Route::post('/store/blog', 'StoreBlog')->name('store.blog');
    //     Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    //     Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
    //     Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
    //     Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    //     Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');
    //     Route::get('/blog', 'HomeBlog')->name('home.blog');
    // });

    // //Footer All Route
    // Route::controller(FooterController::class)->group(function () {
    //     Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    //     Route::post('/update/footer', 'UpdateFooter')->name('update.footer');
    // });

    // //Contact Me Page
    // Route::controller(ContactController::class)->group(function () {
    //     Route::get('/contact', 'Contact')->name('contact.me');
    //     Route::post('/store/message', 'StoreMessage')->name('store.message');
    //     Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    //     // Route::get('/view/modal','ViewModal')->name('view.modal');
    //     Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
    // });
});
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
