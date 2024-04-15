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
            <form action="{{route('medicament.update', $medicament->id)}}" class="p-3" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">

                    <div class="col-12 col-md-6">
                        <label for="">Objet Recette</label>
                        <input type="text" name="objetRecette" class="form-control" placeholder="objetRecette" value="{{$medicament->objetRecette}}">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Montant</label>
                        <input type="number" name="montant" class="form-control" placeholder="montant"  value="{{$medicament->montant}}">
                    </div>
                </div>
                <div class="row mb-3">

                    <div class="col-12 col-md-6">
                        <label for="">Partie Versante</label>
                        <input type="text" name="nomAgent" class="form-control" placeholder="Partie versante"  value="{{$medicament->nomAgent}}">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Date de versement</label>
                        <input type="date" name="date" class="form-control" placeholder="Date"  value="{{$medicament->date}}">
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


<!-- <div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Nouvelle recette</h1>
            <button class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </button>
        </div>
        
       