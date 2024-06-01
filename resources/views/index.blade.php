@extends('app')

@section('content')
    <header>
        <h1>Задачи</h1>
        <section class="exit">
            <h2>Выйти из аккаунта</h2>
            <form action="{{route('home')}}", method="POST">
                @csrf
                <button>Выйти</button>
            </form>
        </section>
    </header>
    <main>
        <section class="create-task">
            <h2>Создать задачу</h2>
            <a class="a-buttons" href="{{ route('create') }}">Создать</a>
        </section>

        <section class="task-list">
            <h2>Список задач</h2>
            <ul>
                @for($item=0; $item < count($tasklist); $item++)
                    @if($item % 2 === 0)
                        <li class="gray">
                    @else
                        <li>
                    @endif
                        <a href="{{$tasklist[$item]->id . '/' . $tasklist[$item]->name}}" class="detail-task">
                            {{ $tasklist[$item]->name }}
                        </a>
                        <a href="{{$tasklist[$item]->id . '/' . $tasklist[$item]->name}}/redact" class="a-buttons">
                            Редактировать
                        </a>
                        <a href="{{$tasklist[$item]->id . '/' . $tasklist[$item]->name}}/deleat" class="a-buttons">
                            Удалить
                        </a>
                    </li>
                @endfor
                <!-- добавить больше задач -->
            </ul>
        </section>    
    </main>
@endsection