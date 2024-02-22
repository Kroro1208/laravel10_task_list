<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Requests\TaskRequest;


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

// Laravel のルートモデルバインディング
// ルートパラメータを{id}から{task}に変更すると、Laravelのルートモデルバインディングがより直感的に機能する
// これは、LaravelがリクエストされたURLのパラメータを自動的に適切なモデルインスタンスに紐づけてくれる
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');


Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());


    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'タスクが追加されました');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());


    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'タスクが更新されました');
})->name('tasks.update');


Route::fallback(function () {
    return 'ページが存在しません';
});
