@extends('layout.app')
@section('content')
    <form method="POST">
        {{csrf_field()}}
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email"/>
        </div>
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password"/>
        </div>
        <button class="button">Login</button>
    </form>
@endsection
