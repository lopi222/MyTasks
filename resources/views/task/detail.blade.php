@extends('app')

@section('content')
<header>
    <h1>{{ $task->name }}</h1>
</header>
<main>
    <section class="create-task" style="overflow-y: scroll;">
        <form>
            <label for="name">Название задачи:</label>
            <input type="text" name="name" id="name" value="{{$task->name}}"  readonly>
            
            <label for="description">Описание задачи:</label>
            <textarea  name="description" id="description" cols="100" rows="10" readonly>{{ $task->description }}</textarea>

            <label for="deadline">Сроки выполнения задачи:</label>
            <input type="date" id="deadline" name="deadline" value="{{$task->deadline}}" readonly>

            <label for="lvl">Приоритет задачи:</label>
            <input type="text" id="lvl" name="lvl" value="{{$task->lvl}}" readonly>
        </form>

        <a href="{{ route('home') }}" class="a-buttons">Вернутся на главную страницу</a>
    </section>    
</main>
@endsection