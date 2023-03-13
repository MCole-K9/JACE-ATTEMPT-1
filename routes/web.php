<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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

Route::get('/', [HomeController::class, 'index'])->name("home");

Route::match(["GET", "POST"], '/login', [AuthController::class, 'login'])->name("login")->middleware("guest");

Route::match(["GET", "POST"], "/register", [AuthController::class, "register"])->name("register")->middleware("guest");

Route::get("/logout", [AuthController::class, "logout"])->name("logout")->middleware("auth");

Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard")->middleware("auth");

Route::resource("/jobs", JobController::class);

Route::get("/candidates", [CandidateController::class, "index"])->name("candidates")->middleware("guest");

Route::get("/contact", [ContactController::class, "index"])->name("contact")->middleware("guest");

Route::get("/about", [AboutController::class, "index"])->name("about")->middleware("guest");

Route::prefix("organization")->group(function () {
    Route::get("/", [OrganizationController::class, "index"])->name("organization")->middleware("auth");
    Route::post("/", [OrganizationController::class, "store"])->name("organization.store")->middleware("auth");
    Route::put("/{id}", [OrganizationController::class, "update"])->name("organization.update")->middleware("auth");
    Route::post("/connect", [OrganizationController::class, "connect"])->name("organization.connect")->middleware("auth");
});

// API Token Routes

Route::get("/tokens/generate", function (){

    // might save other people some time: API Tokens are stored as a hash in the DB,
    // but the key itself is supposed to be used plaintext
    // so you have to explicitly get and pass the plaintext value

    // This closure doesn't need to do anything but return the page

    return Inertia::render('GenerateAPIToken');
})->middleware('auth');

Route::post("/tokens/yourtoken", function(Request $request){

    $user = Auth::user();

    if (auth('sanctum')->check()){
        auth()->user()->tokens()->delete();
    }

    $tokenString = $user->createToken($request->input('token'))->plainTextToken;

    return Inertia::render('ShowAPIToken', ['tokenString' => $tokenString]);
})->middleware('auth');

Route::get("/tokens/yourtoken", function(){
    return redirect('/');
});
