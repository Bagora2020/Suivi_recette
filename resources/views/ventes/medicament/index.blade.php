@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Recettes Médicament</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('ordreRecette.create')}}" class="btn btn-success">
                Nouvel ordre de recette
                <i class="bi bi-folder-plus"></i>
            </a>


            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Objet recette</th>
                        
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix Unitaire</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Période</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recette_medicaments as $recette_medicament)
                    <tr>
                        <th scope="row">{{$recette_medicament->id }}</th>
                        <td>{{$recette_medicament->objetRecette }}</td>
                        
                        <td>{{$recette_medicament->quantite }}</td>
                        <td>{{$recette_medicament->pu }}</td>
                        <td>{{$recette_medicament->montant}}</td>
                        <td>{{$recette_medicament->date}}</td>
                        <td class="d-flex flex-row justify-content-between">
                            <a href="{{ route ('ordreRecette.edit', $recette_medicament->id) }}" class="bg-warning badge "><i class="bi bi-pencil-fill"></i></a>

                            <form method="POST" action="{{ route('ordreRecette.destroy', $recette_medicament->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class=" bg-danger badge">
                                    <i class=" bi bi-trash3-fill"></i></a>
                                </button>
                            </form>


                            <a href="{{route ('ordrederecettepdf.index', $recette_medicament->id)}}" class="bg-info badge" target="_blank"><i class="bi bi-printer"></i></a>
                        </td>

                    </tr>
                    @endforeach
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>{{$total_recette_medicaments}}</td>
                    </tr>
                </tbody>
            </table>
            <ul class="pagination d-flex flex-row mt-3 pagination-center">
                {{$recette_medicaments->onEachSide(1)->links()}}
            </ul>
        </div>
    </div>
</div>

@endsection