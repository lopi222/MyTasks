@extends('app')

@section('content')
<header>
    <h1>Создать задачу</h1>
</header>
<main>
    <section class="create-task" style="overflow-y: scroll;">
        <form method="POST" action="{{ route('create') }}">
            @csrf

            <input type="text" name="name" id="name" placeholder="Название задачи" required>
            <textarea placeholder="Описание задачи" name="description" id="description" cols="100" rows="10" required></textarea>
            <input type="date" placeholder="Срок задачи" id="deadline" name="deadline" required>
            <input type="text" placeholder="Приоритет задачи" id="lvl" name="lvl" required>

            <input type="submit" value="Создать задачу">
        </form>
    </section>    
</main>
@endsection