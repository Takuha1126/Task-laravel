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
}