<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\PrivacyPolicyController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\TermsOfServiceController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;

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
    return view('welcome');
});
Route::get('/loginPhone', function () {
    return view('auth.phone');
});

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
Route::middleware(['auth:sanctum', 'verified'])->get('/report', function () {
    return view('report');
})->name('report');

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
Route::middleware(['auth:sanctum', 'verified'])->post('/upload', function (\Illuminate\Http\Request $request) {
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
Route::middleware('auth:sanctum')->get('/get/cat' , [Controller::class, 'getIssues']);

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
        Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
        Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
    }

    $authMiddleware = config('jetstream.guard')
        ? 'auth:'.config('jetstream.guard')
        : 'auth';

    Route::group(['middleware' => [$authMiddleware, 'verified']], function () {
        // User & Profile...
        Route::get('/user/profile', [UserProfileController::class, 'show'])
            ->name('profile.show');

        // API...
        if (Jetstream::hasApiFeatures()) {
            Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
        }

        // Teams...
        if (Jetstream::hasTeamFeatures()) {
            Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
            Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
            Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');

            Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
                ->middleware(['signed'])
                ->name('team-invitations.accept');
        }
    });
});
