@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Créer Comptes</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('comptes.create')}}" class="btn btn-success">
                Créer Compte
                <i class="bi bi-folder-plus"></i>
            </a>

            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        
                      
                        <th scope="col">Code</th>
                        <th scope="col">Libellé</th>
                   
                        <th scope="col" class="text-center"">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($comptes as $compte)
                    <tr>
                        <th scope="row">{{$compte->id }}</th>
                        <td>{{ $compte->code }}</td>
                        <td>{{ $compte->libelle }}</td>
                      

                        <td class="d-flex flex-row justify-content-around">

                            <a href="#" class="bg-warning badge "><i class="bi bi-pencil-fill"></i></a>

                        

                            <form method="POST" action="#" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class=" bg-danger badge">
                                    <i class=" bi bi-trash3-fill"></i></a>
                                </button>
                            </form>

                         </td>
                    @endforeach
                    </tr>
                   
                   
                </tbody>
            </table>
            <ul class="pagination d-flex flex-row mt-3 pagination-center">
                {{$comptes->onEachSide(1)->links()}}
            </ul>
        </div>
    </div>
</div>

@endsection