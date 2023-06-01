@extends('layouts.app')
@section('title', 'Créer un nouveau profil')
@section('titleH1', 'Créer un nouveau profil')
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <form method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    Créer un profil d'un.e nouvel.le étudiant.e
                </div>
                <div class="card-body">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class='form-control'>
                    
                    <label for="email">Courriel</label>
                    <input type="text" name="email" class="form-control">

                    <label for="address">Adresse</label>
                    <input type="text" name="address" class="form-control" >

                    <label for="phone">Numéro de téléphone</label>
                    <input type="text" name="phone" class="form-control">

                    <label for="bday">Date de naissance</label>
                    <input type="date" name="bday" class="form-control">

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