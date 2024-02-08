@extends('layouts.app')

@section('content')


<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Nouvelle recette</h1>
            <a href="{{route('dashboardgeneral')}}"" class="float-end btn btn-danger">
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
            <form action="{{route('ordreRecette.add')}}" class="p-3" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control rounded-3" placeholder="objet recette" name="objetRecette">
                    </div>
                    <div class="col-12 col-md-6">
                        <select name="type" class="form-select">
                            <option value="medicament">Médicament</option>
                            <option value="musculation">Musculation</option>
                            <option value="consultation">Consultation</option>
                            <option value="petitdej">Ticket Petit Déjeuner</option>
                            <option value="ticketdej">Ticket Déjeuner</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="number" name="quantite" class="form-control" placeholder="Quantite">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="number" name="pu" class="form-control" placeholder="Prix Unitaire">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
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