<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskListController extends Controller
{
    function index(): View
    {
        $tasklist = TaskList::query()
        ->join('users', 'users.id', '=', 'task_lists.userId')
        ->where('username', Auth::user()->username)
        ->orderBy('task_lists.id', 'desc')
        ->get([
            'task_lists.name',
            'task_lists.id',
        ]);

        return view('index', [
            'tasklist' => $tasklist
        ]);
    }

    function detail_index(int $id, string $name): View
    {
        $task = TaskList::query()->where('id', $id)->first();

        if(!isset($task))
        {
            abort(404);
        }

        return view('task.detail', [
            'task' => $task,
        ]);
    }

    function exit(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
