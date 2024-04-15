@extends('layouts.app')

@section('content')


<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrement Recettes Medicaments</h1>
            <a href="{{route('dashboardgeneral')}}"" class=" float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>

        </div>

        @if (session('success'))
        <div class="alert alert-primary text-dark">
            {{ session('success') }}
        </div>
        @endif




        <div class="card-body">
            <form action="{{route('medicament.add')}}" class="p-3" method="post">
                @csrf

                <div class="row mb-3">

                    <div class="col-12 col-md-6">
                        <label for="">Objet Recette</label>
                        <input type="text" name="objetRecette" class="form-control" placeholder="objet Recette">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Montant</label>
                        <input type="text" name="montant" class="form-control" placeholder="Montant">
                    </div>
                </div>
                <div class="row mb-3">
                   

                    <div class="col-12 col-md-6">
                        <label for="">Partie Versante</label>
                        <input type="text" name="nomAgent" class="form-control" placeholder="Partie Versante">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Date de versement</label>
                        <input type="date" name="date" class="form-control" placeholder="Date">
                    </div>
                </div>
             


                
                <div class="row mb-3">
                    <div class="col-offset-4">
                        <button class="btn-success btn" type="submit">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>

@endsection