@extends('layouts.app')

@section('title', 'Événements')

@section('content')
    <h1>Événements à venir</h1>

    @if ($events->isEmpty())
        <p>Aucun événement prévu pour le moment.</p>
    @else
        <ul class="list-group">
            @foreach ($events as $event)
                <li class="list-group-item">
                    <h5>{{ $event->titre }}</h5>
                    <p>
                        {{ $event->date_debut->format('d/m/Y H:i') }}
                        @if($event->lieu)
                            – {{ $event->lieu }}
                        @endif
                    </p>
                    @if($event->description)
                        <p>{{ $event->description }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection
