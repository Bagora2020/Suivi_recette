@extends('layouts.app')

@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrement Recette Terrain Multisport</h1>
            <button class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </button>
        </div>

        <div class="card-body">
            <form action="{{route('terrainmultisport.add')}}" class="p-3" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Nom Locataire</label>
                        <input type="text" class="form-control rounded-3" placeholder="nom" name="nomLocataire">
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <label for="">Contact</label>
                        <input type="text" name="contact" class="form-control" placeholder="contact">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Statut</label>
                        <select name="statut" class="form-select">
                            <option value="Etudiant">Etudiant</option>
                            <option value="Particulier">Particulier</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control" placeholder="date">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Début Match</label>
                        <input type="time" name="debutmatch" class="form-control" placeholder="Début D'activité">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Fin Match</label>
                        <input type="time" name="finmatch" class="form-control" placeholder="Fin D'activité ">
                    </div>
                </div>

                <div class="row mb-3">
                    
                    <div class="col-12 col-md-6">
                        <label for="">Montant</label>
                        <input type="number" name="montant" class="form-control" placeholder="montant ">
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