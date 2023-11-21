@extends('layouts.main')

@dump($trains)
@dump($departing_trains)


@section('content')
    <main >
        <div class="container">
            <h1 class="text-center">Lista Treni</h1>
            <ul class="list-group">
                @foreach ($trains as $train)
                    <li class="list-group-item">{{ $train->Codice_Treno }}</li>
                @endforeach
            </ul>

            <h1 class="text-center">Lista Treni in partenza</h1>
            <ul class="list-group">
                @foreach ($departing_trains as $train)
                    <li class="list-group-item">{{ $train->Codice_Treno }}</li>
                @endforeach
            </ul>
        </div>
    </main>
@endsection
