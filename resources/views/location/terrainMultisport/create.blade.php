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
                        <label for="">Objet Recette</label>
                        <input type="text" class="form-control rounded-3" placeholder="nom" name="ObjetRecette">
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <label for="">Montant</label>
                        <input type="text" name="montant" class="form-control" placeholder="montant">
                    </div>
                </div>
            
                    
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control" placeholder="date">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Partie Versante</label>
                        <input type="PartieVersante" name="PartieVersante" class="form-control" placeholder="Partie Versante">
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