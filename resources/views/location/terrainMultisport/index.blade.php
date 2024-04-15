@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Recettes Terrain Multisport</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('terrainmultisport.create')}}" class="btn btn-success">
                Nouvel ordre de recette
                <i class="bi bi-folder-plus"></i>
            </a>
           
            <table id="example" class="table table-hover mt-3" id="exampele">
                <thead>
                    <tr>
                        <th scope="col">#</th> 
                        <th scope="col">Objet Recette</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date</th>
                        <th scope="col">Partie Versante</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($terrainmultisport as $ternmultisport)
                    <tr>
                        <th scope="row">{{$ternmultisport->id }}</th>
                        <td>{{$ternmultisport->ObjetRecette }}</td>
                        <td>{{number_format($ternmultisport->montant)}}</td>
                        <td>{{$ternmultisport->date }}</td>
                        <td>{{$ternmultisport->PartieVersante }}</td>
                    
                        
                        <td class="d-flex flex-row justify-content-between">
                            <a href="{{route('terrainmultisport.edit', $ternmultisport->id)}}" class="bg-warning badge "><i class="bi bi-pencil-fill"></i></a>

                            <form method="POST" action="{{ route('terrainmultisport.destroy', $ternmultisport->id) }}"" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class=" bg-danger badge">
                                    <i class=" bi bi-trash3-fill"></i></a>
                                </button>
                            </form>


                            <a href="{{route ('ordrederecettepdf.pdfterrainmultisport', $ternmultisport->id)}}" class="bg-info badge " target="_blank"><i class="bi bi-printer"></i></a>
                        </td>

                    </tr>
               
                    @endforeach

                    <tr>
   
                        <td></td>
                        <td>Total</td>
                        <td>{{number_format($total_recette_terrainmultisport)}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <ul class="pagination d-flex flex-row mt-3 pagination-center">
                {{$terrainmultisport->onEachSide(1)->links()}}
            </ul>
        </div>
    </div>
</div>

@endsection