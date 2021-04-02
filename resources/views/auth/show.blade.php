@extends('layouts.app')
@section('title', 'Affichage utilisateur')
@section('content')



    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-3">
                <article class="card">


                    <div class="card-body">
                        <br>
                        <p>Name : {{ $users->name }}</p>
                        <br>
                        <p>Email : {{ $users->email }}</p>

                    </div>
                    <a class="btn btn-dark  float-right" href="{{ route('updateUser') }}">Modifier</a>


                    <form action="{{ url('update/destroy'.$users->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </article>



@endsection
