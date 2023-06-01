@extends('layouts.app')
@section('title', 'Modifier un profil')
@section('titleH1', "Modifier un profil d'étudiant.e")
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <form method="POST">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    Modifier le profil no {{$student->id}}
                </div>
                <div class="card-body">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class='form-control' value="{{$student->name}}">
                    
                    <label for="email">Courriel</label>
                    <input type="text" name="email" class="form-control" value='{{$student->email}}'>

                    <label for="address">Adresse</label>
                    <input type="text" name="address" class="form-control" value='{{$student->address}}'>

                    <label for="phone">Numéro de téléphone</label>
                    <input type="text" name="phone" class="form-control" value='{{$student->phone}}'>

                    <input style='display:none' name="bday" class="form-control" value='{{$student->bday}}'>

                    <label for="city">Ville</label>
                    <select id="city" name="city_id" class="form-control">
                        @foreach($cities as $city)
                        <option value='{{$city->id}}'>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success" value="Enregistrer">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection