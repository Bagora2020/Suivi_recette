@extends('layouts.app')

@section('content')


<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrement Recettes Pains</h1>
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
            <form action="{{route('pain.add')}}" class="p-3" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Quantité</label>
                        <input type="number" name="quantite" class="form-control" placeholder="quantite">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Partie Versante</label>
                        <input type="text" name="nomAgent" class="form-control" placeholder="Partie Versante">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Date de versement</label>
                        <input type="date" name="date" class="form-control" placeholder="Date">
                    </div>
                    <div>

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