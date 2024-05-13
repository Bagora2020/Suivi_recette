<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/cerulean/bootstrap.min.css">
  
<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Nouvelle recette</h1>
            <button class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </button>
        </div>
        <div class="card-body">
        <form action="{{route('Credits.update', $credits->id)}}" class="p-3" method="post">
                 @csrf
                 @method('PUT')
                
                 <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="comptes_id">Comptes</label>
                        <select name="comptes_id" class="form-control" id="comptes_id" value="{{$credits->comptes_id}}">
                            <option value="">Sélectionnez un compte</option>
                            @foreach($comptes as $compte)
                            <option value="{{ $compte->id }}">{{ $compte->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Prevision</label>
                        <input type="number" name="prevision" class="form-control" placeholder="PREVISION" value="{{$credits->prevision}}">
                    </div>               
                 <div>

                <div class="row mb-3">
                  
                    <div class="col-12 col-md-6">
                        <label for="">Budget</label>
                        <input type="number" name="budget" class="form-control" placeholder="BUDGET" value="{{$credits->budget}}">
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


