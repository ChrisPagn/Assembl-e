@extends('layouts.app')

@section('title', $page->titre)

@section('content')
    <h1>{{ $page->titre }}</h1>

    {!! $page->contenu_html !!}
@endsection
