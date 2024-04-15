@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Credits</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('Credits.create')}}" class="btn btn-success">
              Créer Crédits
                <i class="bi bi-folder-plus"></i>
            </a>

            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        
                      
                        <th scope="col">BUDGET</th>
                        <th scope="col">Code</th>
                        <th scope="col">libellé</th>
                        <th scope="col">PREVISION</th>
                   
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($credits as $credit)
                    <tr>
                        <th scope="row">{{$credit->id }}</th>
                        <td>{{number_format($credit->budget) }}</td>
                        <td>{{ $credit->comptes->code }}</td>
                      
                        <td>{{ $credit->comptes->libelle }}</td>
                        <td>{{number_format($credit->prevision) }}</td>
                      
                        <td class="d-flex flex-row ">
                            <a href="{{route('Credits.edit', $credit->id)}}" class="bg-warning badge "><i class="bi bi-pencil-fill"></i></a>

                        

                            <form method="POST" action="{{route('Credits.destroy', $credit->id)}}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class=" bg-danger badge">
                                    <i class=" bi bi-trash3-fill"></i></a>
                                </button>
                            </form>


                            <a href="#" class="bg-info badge" target="_blank"><i class="bi bi-printer"></i></a>
                         </td>
                   @endforeach
                    </tr>
                   <td><b>Total</b></td>
                    <td><b>{{number_format($total_budget)}}</b></td>
                </tbody>
            </table>
            <ul class="pagination d-flex flex-row mt-3 pagination-center">
                {{$credits->onEachSide(1)->links()}}
            </ul>
        </div>
    </div>
</div>

@endsection