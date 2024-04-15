@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">BUDGET</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('budgetdefinitif.create')}}" class="btn btn-success">
                Créer Budget
                <i class="bi bi-folder-plus"></i>
            </a>

            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        
                      
                        <th scope="col">Budget</th>
                        <th scope="col">Année</th>
                   
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($BudgetDefinitif as $BudgetDefinitifs)
                    <tr>
                        <th scope="row">{{$BudgetDefinitifs->id }}</th>
                        <td>{{number_format($BudgetDefinitifs->budget)}}</td>
                        <td>{{ $BudgetDefinitifs->date }}</td>
                      

                        <td class="d-flex flex-row ">
                            <a href="#" class="bg-warning badge "><i class="bi bi-pencil-fill"></i></a>

                        

                            
                            <a href="{{route('Credits.index',  $BudgetDefinitifs->id )}}"  class="bg-info badge"><i class="bi bi-eye-fill"></i></a>
                        </td>
                    @endforeach
                    </tr>
                   

                </tbody>
            </table>
            <ul class="pagination d-flex flex-row mt-3 pagination-center">
                {{$BudgetDefinitif->onEachSide(1)->links()}}
            </ul>
        </div>
    </div>
</div>

@endsection