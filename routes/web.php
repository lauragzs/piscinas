<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PiscinaController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AsignarController;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->user();
    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
        'password' =>encrypt('123456dummy'),
    ]);
    Auth::login($user);
    return redirect('/dashboard');
    // $user->token
});

Route::get('/facebook-auth/redirect', function () {
    return Socialite::driver('facebook')->redirect();
});
 
Route::get('/facebook-auth/callback', function () {
    $user_fb = Socialite::driver('facebook')->user();
    $user = User::updateOrCreate([
        'facebook_id' => $user_fb->id,
    ], [
        'name' => $user_fb->getName(),
        'email' => $user_fb->getEmail(),
        'password' =>encrypt('123456dummy'),
    ]);
    Auth::login($user);
    return redirect('/dashboard');
    // $user->token
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('piscina', PiscinaController::class);
    Route::resource('filtro', FiltroController::class);
    
});

// PAL ADMIN
Route::group(['middleware' => ['role:Administrador']],function () {
    Route::resource('accesorio', AccesorioController::class);
    Route::resource('rol', RoleController::class);
    Route::get('/asignar',[AsignarController::class,'index'])->name('asignar');
    Route::get('/asignar_{id}_editar',[AsignarController::class,'edit'])->name('asignar.edit');
    Route::put('/asignar_{id}',[AsignarController::class,'update'])->name('asignar.update');
});

require __DIR__.'/auth.php';
