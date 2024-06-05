<?php

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\SubController;
use App\Http\Controllers\User\HireController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\AdressController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\SocialMediaController;
use App\Http\Controllers\Frontend\DeliveryController;
use App\Http\Controllers\User\JobAplicationController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;

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

Route::get('/test', function () {
    return view('test');
});

Route::get('/test-success', [SubController::class, 'success']);

Route::get('/test-fail', [SubController::class, 'fail']);

Route::get('/withdraw-success', [SubController::class, 'withdraw_success']);



Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/find-job', [HomeController::class, 'findJobs'])->name('find.job');

//al candidates
Route::get('/all-candidates', [HomeController::class, 'allCandidates'])->name('all.candidates');

Route::get('verify-account', [DashboardController::class, 'verifyaccount'])->name('verifyAccount');
Route::post('verifyotp', [DashboardController::class, 'useractivation'])->name('verifyotp');
Route::get('/verify-otp/{user}', [DashboardController::class, 'verifyOtpByUser'])->name('otp-verify');
Route::get('/resend-otp/{user}', [DashboardController::class, 'resendOtp'])->name('resend-otp');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    //Withdraw

    Route::get('withdraw', [DashboardController::class, 'withdraw'])->name('user.withdraw');

    Route::post('withdraw', [DashboardController::class, 'withdraw_submit'])->name('user.withdraw');


    //job aplication
    Route::get('/job-applicationa/{slug}={id}', [JobAplicationController::class, 'jobAplication'])->name('job.aplication');
    Route::post('/store/job-application', [JobAplicationController::class, 'storeJobAplication'])->name('store.applied.job');

    //applied job list route
    Route::get('/show-job-application-list/{slug}={id}', [JobAplicationController::class, 'showJobApplicationList'])->name('show.job.application.list');
    Route::get('/application-details/{id}', [JobAplicationController::class, 'applicationDetails'])->name('application.details');

    //download applicant file
    Route::get('/download-applicant-file/{id}', [JobAplicationController::class, 'downloadApplicantFile'])->name('download.applicant.file');

    //download delivery attachment
    Route::get('/download-delivery-attachment/{id}', [DeliveryController::class, 'downloadDeliveryAttachment'])->name('download.delivery.order.attachment');


    //user dashboard
    Route::get('/user/deshboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/candidate-detail', [DashboardController::class, 'candidateDetails'])->name('candidate.detail');
    //job post
    Route::get('/user/new-job-post', [PostController::class, 'create'])->name('user.job.post');
    Route::post('/store/new-job', [PostController::class, 'store'])->name('store.job');
    //user Sub
    Route::get('/user/sub', [SubController::class, 'index'])->name('user.sub');
    Route::get('/user/sub/{id}', [SubController::class, 'sub'])->name('user.subs');
    //job post details
    Route::get('/job-post-details/{slug}={id}', [FrontendPostController::class, 'jobPostDetails'])->name('job.post.details');

    //order route
    Route::get('/hire-person/{id}', [HireController::class, 'store'])->name('hire.person');
    Route::get('/direct-hire-person/{id}', [HireController::class, 'direcHireCandidate'])->name('direct.hire.person');

    //seller job order details
    Route::get('/seller/job-order-details/{id}', [JobAplicationController::class, 'sellerJobOrderDetails'])->name('seller.job.order.details');

    //job order cancel
    Route::get('/order-cancel/{id}', [HireController::class, 'orderCancel'])->name('order.cancel');

    //seller job order details
    Route::get('/seller/job-order-complete/{id}', [JobAplicationController::class, 'sellerJobOrderComplete'])->name('seller.job.order.complete');

    // order delivery
    Route::post('/order-delivery', [DeliveryController::class, 'orderDelivery'])->name('order.delivery');

    //candidate profile details
    Route::get('/candidate/profile/{id}', [HomeController::class, 'candidateProfile'])->name('candidate.profile.details');



    //social account update
    Route::post('/update/social-media', [SocialMediaController::class, 'update'])->name('social.account.update');
    // update user info
    Route::post('/update/user/info', [AdressController::class, 'updateUserInfo'])->name('user.update.info');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/edit', function (Request $request) {
        $user = $request->user();
        return view('user.profile.edit', compact('user'));
    })->name('user.profile.edit');
});

//social-login
Route::get('login/{provider}', [SocialController::class, 'redirect']);
Route::get('login/{provider}/callback', [SocialController::class, 'Callback']);


require __DIR__ . '/auth.php';
require __DIR__ . '/admin/auth.php';
