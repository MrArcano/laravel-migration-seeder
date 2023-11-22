@extends('layouts.main')

@section('content')
    <main class="my-5">
        <div class="container">
            <h1 class="text-center mb-3">Lista Treni</h1>
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Codice</th>
                    <th scope="col">Azienda</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Date</th>
                    <th scope="col">Departure time</th>
                    <th scope="col">Arrival time</th>
                    <th scope="col">In Time</th>
                    <th scope="col">Deleted</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                    <tr>
                        <th scope="row">{{ $train->id }}</th>
                        <td>{{ $train->train_code }}</td>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ $train->date }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->in_time ? 'True' : 'False'}}</td>
                        <td>{{ $train->deleted ? 'True' : 'False'}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <h1 class="text-center mb-3">Lista Treni in partenza</h1>
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Codice</th>
                    <th scope="col">Azienda</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Date</th>
                    <th scope="col">Departure time</th>
                    <th scope="col">Arrival time</th>
                    <th scope="col">In Time</th>
                    <th scope="col">Deleted</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($departing_trains as $train)
                    <tr>
                        <th scope="row">{{ $train->id }}</th>
                        <td>{{ $train->train_code }}</td>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ $train->date }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->in_time ? 'True' : 'False'}}</td>
                        <td>{{ $train->deleted ? 'True' : 'False'}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </main>
@endsection
