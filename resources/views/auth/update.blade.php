@extends('layouts.app')

@section('content')



    <form method="POST" action="{{ route('UpdateU', $user) }}">
    @csrf
        {{ method_field('patch') }}


        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        <input type="text" class="form-control" name="email" value="{{ $user->email }}">

        <input type="submit" class="btn btn-primary ">

    </form>




@endsection
