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
use App\Http\Controllers\CustomRequestController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\InfractionController;
use App\Http\Controllers\ProfileController;
use App\Models\CustomRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Spatie\Activitylog\Models\Activity;
use App\Models\Infraction;

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

Route::get("/candidates", [CandidateController::class, "index"])->name("candidates")->middleware("auth");

Route::get("/profile", [ProfileController::class, "index"])->name("profile")->middleware("auth");
Route::post("/profile", [ProfileController::class, "updateAvatar"])->name("profile.updateAvatar")->middleware("auth");

Route::get("/contact", [ContactController::class, "index"])->name("contact")->middleware("guest");

Route::get("/about", [AboutController::class, "index"])->name("about")->middleware("guest");

Route::prefix("organization")->group(function () {
    Route::get("/", [OrganizationController::class, "index"])->name("organization")->middleware("auth");
    Route::post("/", [OrganizationController::class, "store"])->name("organization.store")->middleware("auth");
    Route::put("/{id}", [OrganizationController::class, "update"])->name("organization.update")->middleware("auth");
    Route::post("/connect", [OrganizationController::class, "connect"])->name("organization.connect")->middleware("auth");
    Route::get("/manage-members", [OrganizationController::class, "members"])->name("organization.members")->middleware("auth");
});

Route::resource('/requests', CustomRequestController::class)->middleware('auth');


Route::prefix("mail")->group(function () {
    Route::get('qr-code', [EmailController::class, "qrCode"])->name("mail.qr-code");
    Route::post("/invitation-wqr", [EmailController::class, "sendOrgInvitationWithQRCode"])->name("mail.invitation-wqr")->middleware("auth");
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

/// Admin Routes

Route::get('/administration/logs', function(){
    // fairly sure at this point that i need to foreach the Activity::all()
    $activities = Activity::all();
    foreach ($activities as $activity){
        $activity->causer()->get();
    }

    return Inertia::render('ViewLogEntries', ['logs' => $activities->map(function($log){
        return ['id' => $log->id,
                'name' => $log->log_name,
                'description' => $log->description,
                'subject' => $log->subject_id,
                'causer' => $log->causer_id,
                'causerName' => $log->causer->first_name . ' ' . $log->causer->last_name,
                'timestamp' => $log->created_at];
    })]);
})->middleware('auth:sanctum');

Route::get('/administration/infractions', function(Request $request){
    return Inertia::render('Infractions', InfractionController::getAllFormattedInfractions());
})->middleware('auth:sanctum');

Route::get('/administration/orgrequests', function (Request $request) {
    return Inertia::render('OrganizationRequests');
})->middleware('auth:sanctum');
