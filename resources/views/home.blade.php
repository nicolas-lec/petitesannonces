@extends('layouts.app')

@section('title', 'Acceuil')

@section('content')
    @if(auth()->user()->is_admin == 1)
        <h1>Bienvenue {{ Auth::user()->name }}</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <article class="card col-6">


                @foreach($annonces as $annonce)


                    <header class="card-header">
                        <h1>{{ $annonce->title }}</h1>
                    </header>

                    <div class="card-body">
                        <!-- Permet d'interpreter le HTML et le met en form -->
                        <div>
                            {!! $annonce->slug !!}
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            {!! $annonce->content !!}
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            {!! $annonce->created_at !!}
                        </div>
                    </div>

                    <a class="btn btn-dark  float-right" href="{{ url ('annonce/edit/'.$annonce->id) }}">Modifier</a>

                    <a class="btn btn-dark  float-right" href="{{ url ('annonce/show/'.$annonce->id) }}">Afficher</a>


                    <form action="{{ url('annonce/delete/'.$annonce->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                @endforeach
            </article>
            @else
                <div class="panel-heading">Vous êtes connecté comme Utilisateur normal</div>
            @endif

        </div>
    </div>
    </div>
@endsection
