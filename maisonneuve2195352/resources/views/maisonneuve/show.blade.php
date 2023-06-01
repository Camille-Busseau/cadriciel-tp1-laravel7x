@extends('layouts.app')
@section('title', 'Profil no '.$student->id)
@section('titleH1', 'Étudiant.e no '.$student->id)
@section('content')
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $student->name }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Adresse:</strong> {{ $student->address }}</p>
                <p><strong>Numéro de téléphone:</strong> {{ $student->phone }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Date de naissance:</strong> {{ $student->bday }}</p>
                <p><strong>Ville:</strong> {{ $student->studentHasCity?->name }}</p>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-6">
        <!-- si il y a plus d'un paramètre après la view, entre [a,b,c] -->
        <a href="{{ route('maisonneuve.edit', $student->id) }}" class="btn btn-success">Modifier</a>
    </div>
    <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
        Supprimer
        </button>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="top:30%">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression d'un.e étudiant.e</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Veuillez confirmer la suppression de l'étudiant.e: "{{$student->name}}"
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection