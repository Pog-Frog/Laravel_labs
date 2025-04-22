<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [PostController::class, "index"])->name("posts.index");

Route::prefix("/posts")->group(function () {
    Route::get("/create", [PostController::class, "create"])->name("posts.create");
    Route::post("/", [PostController::class, "store"])->name("posts.store");
    Route::get("/{id}", [PostController::class, "show"])->name("posts.show");
    Route::get("/{id}/edit", [PostController::class, "edit"])->name("posts.edit");
    Route::put("/{id}", [PostController::class, "update"])->name("posts.update");
    Route::delete("/{id}", [PostController::class, "destroy"])->name("posts.destroy");
});