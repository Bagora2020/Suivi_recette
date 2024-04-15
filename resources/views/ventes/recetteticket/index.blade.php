@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Recettes Tickets</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('Recetteticket.create')}}" class="btn btn-success">
                Nouvel ordre de recette
                <i class="bi bi-folder-plus"></i>
            </a>

            @foreach($recettepartype as $type => $recettes)
            <h4 class="text-center">{{ $type }}</h4>
            <table id="#" class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nature Recette</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date</th>
                        <th scope="col">Parties Versantes</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $totalTypeRecette = 0;
                    @endphp
                    @foreach($recettes as $recettetickets)
                    <tr>
                        <th scope="row">{{ $recettetickets->id }}</th>
                        <td>{{ $recettetickets->typeticket->nomticket }}</td>
                        <td>{{ $recettetickets->quantite }}</td>
                        <td>{{ number_format($recettetickets->montant)}}</td>
                        <td>{{ $recettetickets->date }}</td>
                        <td>{{ $recettetickets->partieVersante }}</td>
                        <td class="d-flex flex-row justify-content-between">
                            <a href="{{ route('Recetteticket.edit', $recettetickets->id) }}" class="bg-warning badge "><i class="bi bi-pencil-fill"></i></a>
                            <form method="POST" action="#" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" bg-danger badge"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                            <a href="{{ route('ordrederecettepdf.pdfrecetteticket', $recettetickets->id) }}" class="bg-info badge" target="_blank"><i class="bi bi-printer"></i></a>
                        </td>
                    </tr>
                    @php
                    $totalTypeRecette += $recettetickets->montant;
                    @endphp
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td>{{ number_format($totalTypeRecette) }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            @endforeach

          
            <p class="text-center">
                <strong>Somme Totale des recettes ventes de tickets:</strong>
                <strong>{{ number_format($total_recette_recetteticket) }}</strong>
            </p>

            <ul class="pagination d-flex flex-row mt-3 pagination-center">
                {{ $recetteticket->onEachSide(1)->links() }}
            </ul>
        </div>
    </div>
</div>

@endsection