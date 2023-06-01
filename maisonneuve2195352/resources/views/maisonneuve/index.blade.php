@extends('layouts.app')
@section('title', 'Collège de Maisonneuve')
@section('titleH1', 'Étudiantes & Étudiants')
@section('content')
<div class="card mt-3">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Numéro d'identification</th>
                    <th>Nom</th>
                    <th>Courriel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id}}</td>
                    <td>
                        <a href="{{route('maisonneuve.show', $student->id)}}">{{ $student->name }}</a>
                    </td>
                    <td>{{ $student->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students }}
    </div>
</div>
@endsection