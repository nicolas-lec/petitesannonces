@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-3">
                <article class="card">

                    <header class="card-header">
                        <h1> {{ $annonces->title }}</h1>
                    </header>

                    <div class="card-body">
                        <br>
                        <p>Description : {{ $annonces->content }}</p>
                        <br>
                        <p>Mots Clées : {{ $annonces->slug }}</p>
                        <br>
                        <p>Date de création : {{ $annonces->created_at }}</p>
                    </div>

                </article>

@endsection
