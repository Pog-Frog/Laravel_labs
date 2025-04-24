<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect("/", "/posts");

Route::prefix("/posts")->group(function () {
    Route::get("/", [PostController::class, "index"])->name("posts.index");
    Route::get("/create", [PostController::class, "create"])->name("posts.create");
    Route::post("/", [PostController::class, "store"])->name("posts.store");
    Route::get("/{id}", [PostController::class, "show"])->where('id', '[0-9]+')->name("posts.show");
    Route::get("/{id}/edit", [PostController::class, "edit"])->where('id', '[0-9]+')->name("posts.edit");
    Route::put("/{id}", [PostController::class, "update"])->name("posts.update");
    Route::delete("/{id}", [PostController::class, "destroy"])->where('id', '[0-9]+')->name("posts.destroy");
});

Route::fallback(function () {
    abort(404);
});