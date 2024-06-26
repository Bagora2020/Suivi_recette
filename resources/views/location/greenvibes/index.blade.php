@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Recettes GreenVibes</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{ route ('greenvibes.create') }}" class="btn btn-success">
                Nouvel ordre de recette
                <i class="bi bi-folder-plus"></i>
            </a>

            <table id="example" class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Objet recette</th>
                        <th scope="col">Mois</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date Paiement</th>
                        <th scope="col">Nom Agent</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($greenvibes as $greenvibe)
                    <tr>
                        <th scope="row">{{$greenvibe->id }}</th>
                        <td>{{$greenvibe->objetrecette }}</td>
                        <td>{{$greenvibe->mois }}</td>
                        <td>{{number_format($greenvibe->montant) }}</td>
                        <td>{{$greenvibe->datepaiement }}</td>
                        <td>{{$greenvibe->nomAgent }} </td>
                        <td class="d-flex flex-row justify-content-between">
                            <a href="{{route('greenvibes.edit', $greenvibe->id)}}" class="bg-warning badge "><i class="bi bi-pencil-fill"></i></a>

                            <form method="POST" action="{{ route('greenvibes.destroy', $greenvibe->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class=" bg-danger badge">
                                    <i class=" bi bi-trash3-fill"></i></a>
                                </button>
                            </form>


                            <a href="{{route ('ordrederecettepdf.pdfgreenvibes', $greenvibe->id)}}" class="bg-info badge" target="_blank"><i class="bi bi-printer"></i></a>
                        </td>

                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>{{ number_format($total_recette_greenvibes) }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <ul class="pagination d-flex flex-row mt-3 pagination-center">
                {{$greenvibes->onEachSide(1)->links()}}
            </ul>
        </div>
    </div>
</div>

@endsection