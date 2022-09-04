<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\PrivacyPolicyController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\TermsOfServiceController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
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

Route::get('/report', function () {
    return view('wizard');
});
Route::get('/', function () {
    return redirect('/report');
});
Route::get('/get/cat' , [Controller::class, 'getIssues']);

Route::get('/loginPhone', function () {
    return view('auth.phone');
});
Route::get('/map', function () {
    return view('map');
});
Route::get('/resources', function () {
    return view('resources');
});
Route::post('/check/user' , [Controller::class, 'check']);
Route::post('/create/user' , [Controller::class, 'create']);
Route::post('/store/report' , [Controller::class, 'storeReport']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/declarations', function () {
    return view('declarations');
})->name('declarations');
Route::middleware(['auth:sanctum', 'verified'])->get('/users', function () {
    return view('utilisateurs');
})->name('users');
Route::middleware(['auth:sanctum', 'verified' , 'user'])->get('/user', function () {
    return view('users.index');
})->name('user');

Route::middleware(['auth:sanctum', 'verified'])->get('/issues', function () {
    return view('issues');
})->name('issues');
Route::middleware(['auth:sanctum', 'verified'])->get('/myissue', function () {
    return view('myiss');
})->name('myiss');



Route::middleware(['auth:sanctum', 'verified'])->post('/upload/photo', function (\Illuminate\Http\Request $request) {
   if ($request->hasFile("file")){
       \Illuminate\Support\Facades\Log::info("the main one is there");
       $path = $request->file('file')->store('public/image/blog');
       $realPath = env("APP_URL").'/storage/'.str_replace("public/" ,'' ,  $path) ;
       return response()->json(["path" => $realPath , "result" => true]);

   }else{
       \Illuminate\Support\Facades\Log::info("nothing there bro");
       return response()->json(["result" => false]);

   }
})->name('photo.upload');
Route::post('/upload', function (\Illuminate\Http\Request $request) {
    if ($request->hasFile("current")){
        \Illuminate\Support\Facades\Log::info("the main one is there");
        $path = $request->file('current')->store('public/image/blog');
        $realPath = env("APP_URL").'/storage/'.str_replace("public/" ,'' ,  $path) ;
        return response()->json(["path" => $realPath , "result" => true]);

    }else{
        \Illuminate\Support\Facades\Log::info("nothing there bro");
        return response()->json(["result" => false]);

    }
})->name('upload');

Route::middleware(['auth:sanctum', 'verified'])->post('/upload/logo', function (\Illuminate\Http\Request $request) {
        $path = $request->file('logo')->store('public/logo');
        $realPath = env("APP_URL").'/storage/'.str_replace("public/" ,'' ,  $path) ;
        $logo = new \App\Models\LogoApp();
        $logo->url = $realPath;
        $logo->save();
        return response()->json(["path" => $realPath , "result" => true]);
})->name('logo.upload');
Route::middleware(['auth:sanctum', 'verified'])->post('/upload/issue', function (\Illuminate\Http\Request $request) {
    if ($request->hasFile('issue')){
        $path = $request->file('issue')->store('public/logo');
        $realPath = env("APP_URL").'/storage/'.str_replace("public/" ,'' ,  $path) ;
        return response()->json(["path" => $realPath , "result" => true]);
    }else{
        \Illuminate\Support\Facades\Log::info("the problem");
    }

})->name('issue.upload');
Route::middleware('auth:sanctum')->post('/store/issue' , [Controller::class, 'storeIssue']);
Route::middleware('auth:sanctum')->post('/store/ressource' , [Controller::class, 'storeRessource']);
Route::middleware('auth:sanctum')->get('/get/users' , [Controller::class, 'getUsers']);
Route::middleware('auth:sanctum')->get('/user/details' , [Controller::class, 'details']);
Route::middleware('auth:sanctum')->get('/user/issue' , [Controller::class, 'getMyIssue']);
Route::get('/get/issues' , [Controller::class, 'getIssuesAll']);
Route::get('/get/issuesAproved' , [Controller::class, 'getApprovedIssues']);
Route::get('/get/resources' , [Controller::class, 'getResources']);
Route::middleware('auth:sanctum')->get('/get/map/{id}' , [Controller::class, 'getMap']);
Route::middleware('auth:sanctum')->post('/store/update' , [Controller::class, 'storeUpdate']);

//Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
//    if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
//        Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
//        Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
//    }
//
//    $authMiddleware = config('jetstream.guard')
//        ? 'auth:'.config('jetstream.guard')
//        : 'auth';
//
//    Route::group(['middleware' => [$authMiddleware, 'verified']], function () {
//        // User & Profile...
//        Route::get('/user/profile', [UserProfileController::class, 'show'])
//            ->name('profile.show');
//
//        // API...
//        if (Jetstream::hasApiFeatures()) {
//            Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
//        }
//
//        // Teams...
//        if (Jetstream::hasTeamFeatures()) {
//            Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
//            Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
//            Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
//
//            Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
//                ->middleware(['signed'])
//                ->name('team-invitations.accept');
//        }
//    });
//});
//
//
//Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
//    $enableViews = config('fortify.views', true);
//
//    // Authentication...
//    if ($enableViews) {
//        Route::get('/login', [AuthenticatedSessionController::class, 'create'])
//            ->middleware(['guest:'.config('fortify.guard')])
//            ->name('login');
//    }
//
//    $limiter = config('fortify.limiters.login');
//    $twoFactorLimiter = config('fortify.limiters.two-factor');
//    $verificationLimiter = config('fortify.limiters.verification', '6,1');
//
//    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
//        ->middleware(array_filter([
//            'guest:'.config('fortify.guard'),
//            $limiter ? 'throttle:'.$limiter : null,
//        ]));
//
//    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('logout')
//        ->name('logout');
//
//    // Password Reset...
//    if (Features::enabled(Features::resetPasswords())) {
//        if ($enableViews) {
//            Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
//                ->middleware(['guest:'.config('fortify.guard')])
//                ->name('password.request');
//
//            Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
//                ->middleware(['guest:'.config('fortify.guard')])
//                ->name('password.reset');
//        }
//
//        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//            ->middleware(['guest:'.config('fortify.guard')])
//            ->name('password.email');
//
//        Route::post('/reset-password', [NewPasswordController::class, 'store'])
//            ->middleware(['guest:'.config('fortify.guard')])
//            ->name('password.update');
//    }
//
//    // Registration...
//    if (Features::enabled(Features::registration())) {
//        if ($enableViews) {
//            Route::get('/register', [RegisteredUserController::class, 'create'])
//                ->middleware(['guest:'.config('fortify.guard')])
//                ->name('register');
//        }
//
//        Route::post('/register', [RegisteredUserController::class, 'store'])
//            ->middleware(['guest:'.config('fortify.guard')]);
//    }
//
//    // Email Verification...
//    if (Features::enabled(Features::emailVerification())) {
//        if ($enableViews) {
//            Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
//                ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//                ->name('verification.notice');
//        }
//
//        Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'signed', 'throttle:'.$verificationLimiter])
//            ->name('verification.verify');
//
//        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'throttle:'.$verificationLimiter])
//            ->name('verification.send');
//    }
//
//    // Profile Information...
//    if (Features::enabled(Features::updateProfileInformation())) {
//        Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
//            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//            ->name('user-profile-information.update');
//    }
//
//    // Passwords...
//    if (Features::enabled(Features::updatePasswords())) {
//        Route::put('/user/password', [PasswordController::class, 'update'])
//            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//            ->name('user-password.update');
//    }
//
//    // Password Confirmation...
//    if ($enableViews) {
//        Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
//            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')]);
//    }
//
//    Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
//        ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//        ->name('password.confirmation');
//
//    Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
//        ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//        ->name('password.confirm');
//
//    // Two Factor Authentication...
//    if (Features::enabled(Features::twoFactorAuthentication())) {
//        if ($enableViews) {
//            Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
//                ->middleware(['guest:'.config('fortify.guard')])
//                ->name('two-factor.login');
//        }
//
//        Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
//            ->middleware(array_filter([
//                'guest:'.config('fortify.guard'),
//                $twoFactorLimiter ? 'throttle:'.$twoFactorLimiter : null,
//            ]));
//
//        $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
//            ? [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'password.confirm']
//            : [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')];
//
//        Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
//            ->middleware($twoFactorMiddleware)
//            ->name('two-factor.enable');
//
//        Route::post('/user/confirmed-two-factor-authentication', [ConfirmedTwoFactorAuthenticationController::class, 'store'])
//            ->middleware($twoFactorMiddleware)
//            ->name('two-factor.confirm');
//
//        Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
//            ->middleware($twoFactorMiddleware)
//            ->name('two-factor.disable');
//
//        Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
//            ->middleware($twoFactorMiddleware)
//            ->name('two-factor.qr-code');
//
//        Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
//            ->middleware($twoFactorMiddleware)
//            ->name('two-factor.recovery-codes');
//
//        Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
//            ->middleware($twoFactorMiddleware);
//    }
//});
// get issues
