@extends('layouts.app')

@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Nouvelle recette</h1>
            <button class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </button>
        </div>

        <div class="card-body">
            <form action="{{route('sallecafetaria.add')}}" class="p-3" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control rounded-3" placeholder="objet recette" name="nomlocataire">
                    </div>
                    <div class="col-12 col-md-6">
                        <select name="statut" class="form-select">
                            <option value="Etudiant">Etudiant</option>
                            <option value="Particulier">Particulier</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <select name="natureActivite" class="form-select">
                            <option value="Lucrative">Lucrative</option>
                            <option value="Non-Lucrative">Non-Lucrative</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <input type="text" name="motif" class="form-control" placeholder="motif">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="time" name="debutAct" class="form-control" placeholder="Début D'activité">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="time" name="finAct" class="form-control" placeholder="Fin D'activité ">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="text" name="contactresponsable" class="form-control" placeholder="contact">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="number" name="montant" class="form-control" placeholder="montant ">
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="date" name="date" class="form-control" placeholder="date ">
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