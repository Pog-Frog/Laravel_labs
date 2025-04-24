<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

// Route::redirect("/", "/posts");

Route::get('/dashboard', function () {
    // return view('dashboard');
    return redirect()->route("posts.index");
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix("/posts")->group(function () {
        Route::get("/", [PostController::class, "index"])->name("posts.index");
        Route::get("/create", [PostController::class, "create"])->name("posts.create");
        Route::post("/", [PostController::class, "store"])->name("posts.store");
        Route::get("/{id}", [PostController::class, "show"])->where('id', '[0-9]+')->name("posts.show");
        Route::get("/{id}/edit", [PostController::class, "edit"])->where('id', '[0-9]+')->name("posts.edit");
        Route::put("/{id}", [PostController::class, "update"])->name("posts.update");
        Route::delete("/{id}", [PostController::class, "destroy"])->where('id', '[0-9]+')->name("posts.destroy");
    });
});


Route::fallback(function () {
    abort(404);
});

require __DIR__.'/auth.php';
