@extends('layouts.app')

@section('content')


<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrement des Comptes</h1>
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
            <form action="{{route('comptes.add')}}" class="p-3" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Compte</label>
                        <input type="number" name="code" class="form-control" placeholder="Numero compte">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Libellé</label>
                        <input type="texte" name="libelle" class="form-control" placeholder="libelle">
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