@extends('layouts.app')

@section('title', $page->titre)

@section('content')
    <h1>{{ $page->titre }}</h1>

    {!! $page->contenu_html !!}

    {{-- plus tard : formulaire de contact ici --}}
@endsection
