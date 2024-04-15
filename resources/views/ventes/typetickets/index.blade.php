@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">les types de tickets</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('typetickets.create')}}" class="btn btn-success">
                Nouvel ordre de recette
                <i class="bi bi-folder-plus"></i>
            </a>

            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        
                        <th scope="col">Nature Tickets</th>
                        <th scope="col">Valeur</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($typeticket as $typetickets)
                    <tr>
                        <th scope="row">{{$typetickets->id }}</th>
                        <td>{{$typetickets->nomticket }}</td>
                        <td>{{$typetickets->valeur }}</td>
                        <td>{{$typetickets->description }}</td>
                        <td class="d-flex flex-row justify-content-between">
                            <a href="{{route('typetickets.edit', $typetickets->id)}}" class="bg-warning badge "><i class="bi bi-pencil-fill"></i></a>

                            <form method="POST" action="{{route('typetickets.destroy', $typetickets->id)}}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');">
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
                {{$typeticket->onEachSide(1)->links()}}
            </ul>
        </div>
    </div>
</div>

@endsection