@extends('layouts.app')

@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrement Recette Greenvibes</h1>
            <button class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </button>
        </div>

        <div class="card-body">
            <form action="{{route('greenvibes.add')}}" class="p-3" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Nature de la recette</label>
                        <input type="text" class="form-control rounded-3" placeholder="objet recette" name="objetrecette">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Mois</label>
                        <select name="mois" class="form-select">
                            <option value="Janvier">Janvier</option>
                            <option value="Février">Février</option>
                            <option value="Mars">Mars</option>
                            <option value="Avril">Avril</option>
                            <option value="Mai">Mai</option>
                            <option value="Juin">Juin</option>
                            <option value="Juillet">Juillet</option>
                            <option value="Août">Août</option>
                            <option value="Septembre">Septembre</option>
                            <option value="Octobre">Octobre</option>
                            <option value="Novembre">Novembre</option>
                            <option value="Decembre">Décembre</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Montant</label>
                        <input type="number" name="montant" class="form-control" placeholder="montant">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Date Paiement</label>
                        <input type="Date" name="datepaiement" class="form-control" placeholder="Date">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Nom Agent</label>
                        <input type="text" name="nomAgent" class="form-control" placeholder="Nom Agent">
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