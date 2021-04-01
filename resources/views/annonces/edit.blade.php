@extends('layouts.app')
@section('title', 'Edition')

@section('content')

    <div class="container mt-5">
        <form method="POST" action="{{ url('annonce/edit/'.$annonces->id) }}">
            @csrf

            <div class="form-group">

                <label>Titre de l'annonce</label>
                <input type="text" class="form-control" name="title" value="{{ $annonces->title }}">

            </div>

            <div class="form-group">

                <label>Description</label>
                <textarea rows="4" class="form-control" name="content">{{ $annonces->content }}</textarea>

                <label>Date</label>
                <input type="date" class="form-control" name="created_at" value="{{ $annonces->created_at }}">

                <label>Mots clées</label>
                <textarea rows="4" class="form-control" name="slug"  >{{ $annonces->slug }}</textarea>

            </div>

            <input type="submit" class="btn btn-primary float-right"/>
            @include('message.alert')

        </form>
    </div>

@endsection
