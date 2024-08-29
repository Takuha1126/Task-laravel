<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        $user = Auth::user();
        return view('index',compact('tasks','user'));
    }

    public function create() {
        return view('create');
    }

    public function store(TaskRequest $request) {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Task::create($data);

    return redirect()->route('task.create')->with('success', 'タスクを追加しました');
    }


    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'タスクを削除しました');
    }

    public function edit($id)
{
    $task = Task::findOrFail($id);
    return view('edit', compact('task'));
}

public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);
    $task->title = $request->input('title');
    $task->date = $request->input('date');
    $task->detail = $request->input('detail');
    $task->save();

    return redirect()->route('task.index')->with('message', 'タスクが更新されました');
}
}
