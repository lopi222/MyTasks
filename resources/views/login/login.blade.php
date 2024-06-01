@extends('app')

@section('content')

<div class="container">
  <div class="wrapper">
    <div class="title">
      <span>Войти в аккаунт</span>
    </div>
    <form action="{{ route('login') }}" method="POST">
      @csrf

      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Логин" name="login" required>
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Пароль" name="password" required>
      </div>
      <div class="row button">
        <input type="submit" value="Войти">
      </div>

      @if($errors->any())
        <div class="errors">
          <span>{{$errors->first()}}</span>
        </div>
      @endif

      <div class="signup-link"> <a href="{{ route('regist') }}"> Нету аккаунта?</a></div>
    </form>
  </div>
</div>
