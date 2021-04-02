@extends('layouts.app')
@section('title', 'Edition utilisateur')
@section('content')



    <form method="POST" action="{{ route('UpdateU', $user) }}">
    @csrf
        {{ method_field('patch') }}

        <label>Nom</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        <label>Email</label>
        <input type="text" class="form-control" name="email" value="{{ $user->email }}">

        <input type="submit" class="btn btn-primary">

    </form>




@endsection
