<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    function index(): View
    {
        return view('task.create');
    }

    function create(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'lvl' => 'required|string',
        ]);

        $data['deadline'] = date('Y-m-d', strtotime($data['deadline']));

        $id = User::query()->where('username', Auth::user()->username)->first('id');
        
        TaskList::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'deadline' => $data['deadline'],
            'lvl' => $data['lvl'],
            'userId' => $id->id,
        ]);

        return redirect()->route('home');
    }
}
