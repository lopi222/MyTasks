@extends('app')

@section('content')
<header>
    <h1>Редактировать задачу</h1>
</header>
<main>
    <section class="create-task" style="overflow-y: scroll;">
        <form method="POST" action="/{{$task->id}}/{{$task->name}}/redact">
            @csrf

            <input type="text" name="name" id="name" placeholder="Название задачи" value="{{$task->name}}" required>
            <textarea placeholder="Описание задачи" name="description" id="description"  cols="100" rows="10" required>{{ $task->description }}</textarea>
            <input type="date" placeholder="Срок задачи" id="deadline" name="deadline" value="{{ $task->deadline }}" required>
            <input type="text" placeholder="Приоритет задачи" id="lvl" name="lvl" value="{{ $task->lvl }}" required>

            <input type="submit" value="Редактировать задачу">
        </form>
    </section>    
</main>
@endsection