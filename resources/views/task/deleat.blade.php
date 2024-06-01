@extends('app')

@section('content')
    <header>
        <h1>Удаление задачи</h1>
    </header>
    <main>
        <section class="create-task">
            <h2>Вы точно хотите удалить данную задачу?</h2>
        </section>

        <form method="POST" action="/{{$id}}/{{$name}}/deleat">
            @csrf
            <button class="a-buttons">Да</button>
        </form>
    </main>
@endsection