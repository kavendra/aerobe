<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsettingController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProminentController;
use App\Http\Controllers\Admin\BusinessVerticalController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NewsAndEventController;
use App\Http\Controllers\Admin\CsrController;
use App\Http\Controllers\Admin\KnowledgeHubController;
use App\Http\Controllers\Admin\AerobeAcademyController;
use App\Http\Controllers\Admin\OurPortfolioController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\ShopController;

use App\Http\Controllers\Admin\TopMenuController;
use App\Http\Controllers\Admin\MainMenuController;
use App\Http\Controllers\Admin\LegalInformationMenuController;
use App\Http\Controllers\Admin\ProductsResourceMenuController;
use App\Http\Controllers\Admin\ConnectWithUsMenuController;

use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\ShopPageController;
use App\Http\Controllers\Admin\WorkAerobePageController;
use App\Http\Controllers\Admin\CsrPageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\CookiePreferencePageController;
use App\Http\Controllers\Admin\SupportPageController;
use App\Http\Controllers\Admin\PrivacyPolicyPageController;
use App\Http\Controllers\Admin\TermsOfUsePageController;

use App\Http\Controllers\Admin\OurPortfolioPageController;
use App\Http\Controllers\Admin\SolutionPageController;
use App\Http\Controllers\Admin\KnowledgeHubPageController;
use App\Http\Controllers\Admin\AerobeAcademyPageController;
use App\Http\Controllers\Admin\NewsEventPageController;
use App\Http\Controllers\Front\NewsletterController;
use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\ContactUsController;
use App\Http\Controllers\Front\LegalInfoController;
use App\Http\Controllers\Front\WorkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Auth::routes();

// Group all admin routes with the 'admin' prefix and 'admin.' name
Route::prefix('admin')->name('admin.')->group(function () {

    // Custom login route for admin
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Password reset routes for admin
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);
    
    // Admin-only routes protected by 'auth' and 'IsAdmin' middleware
    Route::middleware(['auth', 'is_admin'])->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'root'])->name('dashboard');
        Route::resource('user', UserController::class);
        Route::resource('user-role', UserRoleController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('news-category', NewsCategoryController::class);
        
        Route::resource('tag', TagController::class);
        Route::resource('country', CountryController::class);
        Route::resource('prominent', ProminentController::class);
        Route::resource('business-vertical', BusinessVerticalController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('news-and-event', NewsAndEventController::class);
        Route::resource('csr', CsrController::class);
        Route::resource('shop', ShopController::class);
        Route::resource('knowledge-hub', KnowledgeHubController::class);
        Route::resource('our-portfolio', OurPortfolioController::class);
        Route::resource('solution', SolutionController::class);
        Route::resource('aerobe-academy', AerobeAcademyController::class);
        Route::resource('web-setting', WebsettingController::class);

        Route::resource('top-menu', TopMenuController::class);
        Route::resource('main-menu', MainMenuController::class);
        Route::resource('products-resource-menu', ProductsResourceMenuController::class);
        Route::resource('connect-with-us-menu', ConnectWithUsMenuController::class);
        Route::resource('legal-information-menu', LegalInformationMenuController::class);

        Route::resource('home-page', HomePageController::class);
        Route::resource('shop-page', ShopPageController::class);
        Route::resource('work-aerobe-page', WorkAerobePageController::class);
        Route::resource('csr-page', CsrPageController::class);
        Route::resource('contact-page', ContactPageController::class);

        Route::resource('our-portfolio-page', OurPortfolioPageController::class);
        Route::resource('solution-page', SolutionPageController::class);
        Route::resource('knowledge-hub-page', KnowledgeHubPageController::class);
        Route::resource('aerobe-academy-page', AerobeAcademyPageController::class);
        Route::resource('news-event-page', NewsEventPageController::class);


        Route::resource('about-page', AboutPageController::class);
        Route::resource('cookie-preference-page', CookiePreferencePageController::class);
        Route::resource('privacy-policy-page', PrivacyPolicyPageController::class);
        Route::resource('terms-of-use-page', TermsOfUsePageController::class);
    });
});

Route::get('our-portfolio/{slug}', [App\Http\Controllers\Front\OurPortfolioController::class, 'show']);
Route::get('solution/{slug}', [App\Http\Controllers\Front\SolutionController::class, 'show']);
Route::resource('product', App\Http\Controllers\Front\ProductController::class);
Route::resource('news-event', App\Http\Controllers\Front\NewsEventController::class);
Route::get('news-event/{slug}', [App\Http\Controllers\Front\NewsEventController::class, 'show']);

Route::post('news-event/by-category', [App\Http\Controllers\Front\NewsEventController::class, 'byCategory']);
Route::resource('knowledge-hub', App\Http\Controllers\Front\KnowledgeHubController::class);
Route::get('knowledge-hub/{slug}', [App\Http\Controllers\Front\KnowledgeHubController::class, 'show']);
Route::resource('academy', App\Http\Controllers\Front\AcademyController::class);
Route::get('academy/{slug}', [App\Http\Controllers\Front\AcademyController::class, 'show']);

Route::resource('csr', App\Http\Controllers\Front\CsrController::class);
Route::get('csr/{slug}', [App\Http\Controllers\Front\CsrController::class, 'show']);
Route::resource('shop', App\Http\Controllers\Front\ShopController::class);
Route::get('shop/{slug}', [App\Http\Controllers\Front\ShopController::class, 'show']);
Route::resource('work', WorkController::class);
Route::get('about-us', [AboutUsController::class, 'index']);
Route::resource('contact-us', ContactUsController::class);
Route::get('legal/{page}', [LegalInfoController::class, 'index']);
Route::get('set-country', [App\Http\Controllers\HomeController::class, 'setCountry']);
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::post('subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
