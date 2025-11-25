@extends('layouts.app')

@section('title', $page->titre)

@section('content')
    <h1>{{ $page->titre }}</h1>

    {!! $page->contenu_html !!}

    <hr>
    <h2>Prochains événements</h2>
    <p><a href="{{ route('evenements') }}">Voir tous les événements</a></p>
@endsection
