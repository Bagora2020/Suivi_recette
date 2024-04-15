@extends('layouts.app')

@section('content')


<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrement des Crédits</h1>
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
            <form action="{{route('Credits.add')}}" class="p-3" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="comptes_id">Comptes</label>
                        <select name="comptes_id" class="form-control" id="comptes_id">
                            <option value="">Sélectionnez un compte</option>
                            @foreach($comptes as $compte)
                            <option value="{{ $compte->id }}">{{ $compte->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Prevision</label>
                        <input type="number" name="prevision" class="form-control" placeholder="PREVISION">
                    </div>               
              <div>

                <div class="row mb-3">
                  
                    <div class="col-12 col-md-6">
                        <label for="">Budget</label>
                        <input type="number" name="budget" class="form-control" placeholder="BUDGET">
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