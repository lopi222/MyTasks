<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedactController extends Controller
{
    function index(int $id, string $name): View
    {
        $task = TaskList::query()->where('id', $id)->first();

        if(!isset($task))
        {
            abort(404);
        }

        return view('task.redact', [
            'task' => $task,
        ]);
    }

    function indexDeleat(int $id, string $name): View
    {
        $task = TaskList::query()->where('id', $id)->first();
        
        if(!isset($task))
        {
            abort(404);
        }

        return view('task.deleat', [
            'id' => $id,
            'name' => $name,
        ]);
    }

    function deleat(Request $request, int $id, string $name): RedirectResponse
    {
        TaskList::query()
        ->where('id', $id)
        ->delete();

        return redirect()->route('home');
    }

    function update(Request $request, int $id, string $name): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'lvl' => 'required|string',
        ]);

        $data['deadline'] = date('Y-m-d', strtotime($data['deadline']));

        TaskList::query()
        ->where('id', $id)
        ->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'deadline' => $data['deadline'],
            'lvl' => $data['lvl'],
        ]);

        return redirect()->route('home');
    }
}
