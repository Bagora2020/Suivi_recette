<!-- @extends('layouts.app')

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
            <form action="{{route('greenvibes.add')}}" class="p-3">
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control rounded-3" placeholder="objet recette" name="objetrecette">
                    </div>
                    <div class="col-12 col-md-6">
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
                            <option value="Décembre">Décembre</option>

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
                        <input type="date" name="datedebut" class="form-control" placeholder="Date debut">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="date" name="datefin" class="form-control" placeholder="Date Fin">
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

@endsection -->