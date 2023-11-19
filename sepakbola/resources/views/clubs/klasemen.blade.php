@extends('layouts.app')

@section('content')
    <h2>Klasemen</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Klub</th>
                <th scope="col">Ma</th>
                <th scope="col">Me</th>
                <th scope="col">S</th>
                <th scope="col">K</th>
                <th scope="col">GM</th>
                <th scope="col">GK</th>
                <th scope="col">Point</th>
            </tr>
        </thead>
        <tbody>
            @foreach($klasemen as $item)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $item->club->nama }}</td> {{-- Mengambil nama klub --}}
                <td>{{ $item->ma }}</td>
                <td>{{ $item->me }}</td>
                <td>{{ $item->s }}</td>
                <td>{{ $item->k }}</td>
                <td>{{ $item->gm }}</td>
                <td>{{ $item->gk }}</td>
                <td>{{ $item->point }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection