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

// Laravel のルートモデルバインディング
// ルートパラメータを{id}から{task}に変更すると、Laravelのルートモデルバインディングがより直感的に機能する
// これは、LaravelがリクエストされたURLのパラメータを自動的に適切なモデルインスタンスに紐づけてくれる
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

// 以下のように記載する必要はない
// Route::get('/tasks/{id}/edit', function ($id) {
//     return view('edit', ['task' => Task::findOrFail($id)]);
// })->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');


Route::post('/tasks', function (Request $request) {
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'タスクが追加されました');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, Request $request) {
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'タスクが更新されました');
})->name('tasks.update');


Route::fallback(function () {
    return 'ページが存在しません';
});
