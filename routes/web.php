<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


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
    return redirect()->route('tasks.index');
});

Route::view('/tasks/create', 'create')->name('create');


Route::get('/tasks', function () {
    return view('index', ['tasks' => Task::latest()->get()]); // Task::latest()->where('completed', true)->get()
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {

    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');


Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');


Route::fallback(function () {
    return 'ページが存在しません';
});
